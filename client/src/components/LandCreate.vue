<template>
    <div>
        <h1 class="flex flex-row justify-center text-3xl font-bold mt-5" v-if="isEdit==true">
            Modifica il terreno selezionato
        </h1>
        <h1 class="flex flex-row justify-center text-3xl font-bold mt-5" v-if="isEdit==false">
            Inserisci un nuovo terreno
        </h1>
        <div class="flex ml-10 justify-center">
            <div class="flex flex-col mt-10">
                <div v-for="field in forms" :key="field.code" class="grid grid-cols-2 gap-1 pt-5">
                    <label>
                        {{field.label}}<span class='font-bold text-red-600' v-if="!newLand[field.code]">*</span>
                    </label>
                    <div v-if="field.type == 'text'">
                        <input type="text" :placeholder="field.placeholder" :name="field.code" v-model="newLand[field.code]" />
                    </div>
                    <div v-if="field.type == 'number'">
                        <input type="number" :placeholder="field.placeholder" :name="field.code" v-model="newLand[field.code]" />
                    </div>
                    <div v-if="field.type == 'select'">
                        <select :name="field.code" v-model="newLand[field.code]" class="bg-white w-full">
                            <option v-for="opt in field.options" :key="opt.value" :value="opt.value">
                                {{opt.label}}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-center">
                    <button @click="saveLand(newLand)" :disabled="!isFormComplete" class="mt-5 ml-5 rounded-md px-4 py-2 bg-green-800 cursor-pointer text-white font-bold">
                        Salva
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data(){
        return{
            isEdit:false,
            conf:false,
            confC:false,
            newLand:{
                comune:"",
                foto:"",
                dimensione:0,
                foglio_catastale:"",
                mappa_catastale:"",
                parcella_catastale:"",
                tipologia_terreno:"",
                tipo_arrigazione:"",
                tipo_offerta:"",
                canone_offerta:0,
                disponibile_subito:"",
            },
            forms:[
                {
                    code:"comune",
                    type:"text",
                    label:"Comune",
                    palceholder:"comune",
                    required:true
                },
                {
                    code:"foto",
                    type:"text",
                    label:"Foto Aerea",
                    palceholder:"foto aerea",
                    required:true
                },
                {
                    code:"dimensione",
                    type:"number",
                    label:"Dimensione (m²)",
                    palceholder:"dimensione (m²)",
                    required:true
                },
                {
                    code:"foglio_catastale",
                    type:"text",
                    label:"Foglio Catastale",
                    palceholder:"foglio catastale",
                    required:true
                },
                {
                    code:"mappa_catastale",
                    type:"text",
                    label:"Mappale Catastale",
                    palceholder:"mappa catastale",
                    required:true
                },
                {
                    code:"parcella_catastale",
                    type:"text",
                    label:"Parcella Catastale",
                    palceholder:"parcella catastale",
                    required:true
                },
                {
                    code:"tipologia_terreno",
                    type:"select",
                    label:"Tipologia del Terreno",
                    placeholder:"tipologia terreno",
                    required:true,
                    options:[
                        {
                            value:"Argilloso",
                            label:"Argilloso"
                        },
                        {
                            value:"Sabbioso",
                            label:"Sabbioso"
                        },
                        {
                            value:"Ghiaioso",
                            label:"Ghiaioso"
                        },
                        {
                            value:"Tufo",
                            label:"Tufo"
                        }
                    ]
                },
                {
                    code:"tipo_arrigazione",
                    type:"select",
                    label:"Tipo di Irrigazione",
                    placeholder:"tipo irrigazione",
                    required:true,
                    options:[
                        {
                            value:"A scorrimento",
                            label:"A scorrimento"
                        },
                        {
                            value:"Pozzo",
                            label:"Pozzo"
                        },
                        {
                            value:"Canale",
                            label:"Canale"
                        },
                        {
                            value:"Senz'acqua",
                            label:"Senz'acqua"
                        }
                    ]
                },
                {
                    code:"tipo_offerta",
                    type:"select",
                    label:"Tipo di Offerta",
                    placeholder:"tipo offerta",
                    required:true,
                    options:[
                        {
                            value:"Vendita",
                            label:"Vendita"
                        },
                        {
                            value:"Affitto",
                            label:"Affitto"
                        },
                        {
                            value:"Affitto gratuito",
                            label:"Affitto gratuito"
                        }
                    ]
                },
                {
                    code:"canone_offerta",
                    type:"number",
                    label:"Canone dell'Offerta (€)",
                    palceholder:"canone offerta (€)",
                    required:true
                },
                {
                    code:"disponibile_subito",
                    type:"select",
                    label:"Disponibilità immediata",
                    placeholder:"disponibilità immediata",
                    required:true,
                    options:[
                        {
                            value:"SI",
                            label:"SI"
                        },
                        {
                            value:"NO",
                            label:"NO"
                        }
                    ]
                },
            ]
        }
    },
    async mounted(){
        if(this.$route.name == "update_land"){
            this.isEdit = true;
            let id = this.$route.params.id;
            let response = await axios.get("http://localhost:8000/api/detail/"+id);
            this.newLand = response.data;
        }
    },
    methods:{
        async saveLand(){
            let response;
            let id;
            if(this.isEdit == true){
                id = this.$route.params.id;
                response = await axios.put("http://localhost:8000/api/update/"+id,this.newLand);
                this.newLand = response.data;
                this.$router.push({
                    name:"list_lands"
                });
            }else{
                response = await axios.post("http://localhost:8000/api/insert",this.newLand);
                this.newLand = response.data;
                this.$router.push({
                    name:"list_lands"
                });
            }
        },
        confUpdate(){
            this.conf = true;
        },
        confCreate(){
            this.confC = true;
        }
    },
    computed:{
        isFormComplete(){
            let form = true;
            this.forms.forEach(field =>{
                if(field.required){
                    form = form && !!this.newLand[field.code];
                }
            });
            return form;
        }
    }
}
</script>