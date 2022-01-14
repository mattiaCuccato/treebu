<template>
    <div>
        <h1 class="flex flex-row justify-center text-3xl font-bold mt-5">
            Dettaglio del Terreno
        </h1>
        <div class="flex ml-10 mt-10">
            <span @click="$router.go(-1)" class="text-xl px-3 py-1 rounded-md font-bold cursor-pointer"> &lt; Back </span>
        </div>
        <div class="flex ml-10 mt-5">
            <div class="flex flex-col">
                <img :src="land.foto">
            </div>
            <div class="flex flex-col ml-5 text-xl">
                <div class="flex flex-row">
                    Comune:&nbsp; <span class="font-bold">{{land.comune}}</span>
                </div>
                <div class="flex flex-row pt-1">
                    Dimensione:&nbsp; <span class="font-bold">{{land.dimensione}} m²</span>
                </div>
                <div class="flex flex-row pt-1">
                    Foglio Catastale:&nbsp; <span class="font-bold">{{land.foglio_catastale}}</span>
                </div>
                <div class="flex flex-row pt-1">
                    Mappale Catastale:&nbsp; <span class="font-bold">{{land.mappa_catastale}}</span>
                </div>
                <div class="flex flex-row pt-1">
                    Parcella Catastale:&nbsp; <span class="font-bold">{{land.parcella_catastale}}</span>
                </div>
                <div class="flex flex-row pt-1">
                    Tipologia di Terreno:&nbsp; <span class="font-bold">{{land.tipologia_terreno}}</span>
                </div>
                <div class="flex flex-row pt-1">
                    Tipo di Irrigazione:&nbsp; <span class="font-bold">{{land.tipo_arrigazione}}</span>
                </div>
                <div class="flex flex-row pt-1">
                    Tipo di Offerta:&nbsp; <span class="font-bold">{{land.tipo_offerta}}</span>
                </div>
                <div class="flex flex-row pt-1">
                    Canone dell'offerta:&nbsp; <span class="font-bold">{{land.canone_offerta}} €</span>
                </div>
                <div class="flex flex-row pt-1">
                    Disponibile da subito:&nbsp; <span class="font-bold">{{land.disponibile_subito}}</span>
                </div>
            </div>
        </div>
        <div class="flex ml-10 mt-5 text-white font-bold">
            <button class="rounded-md px-4 py-2 bg-green-800 cursor-pointer text-white font-bold mr-3" @click="goToUpdate()">Update</button>
            <button class="rounded-md px-4 py-2 bg-red-800 cursor-pointer text-white font-bold mr-3" @click="cancella()">Delete</button>
        </div>
    </div>
</template>

<script>
import axios from "axios"
export default {
    data(){
        return{
            land:null,
            id:null,
            conf:false
        }
    },
    async mounted(){
        this.reload();
    },
    methods:{
        async reload(){
            this.id = this.$route.params.id;
            let response = await axios.get("http://localhost:8000/api/detail/"+this.id);
            this.land = response.data;
        },
        confDelete(){
            this.conf = true;
        },
        async cancella(){
            this.id = this.$route.params.id;
            await axios.delete('http://localhost:8000/api/delete/'+this.id);
            this.$router.push({
                name:"list_lands",
            });
            this.reload();
        },
        goToUpdate(){
            this.id = this.$route.params.id;
            this.$router.push({
                name:"update_land",
                params:{
                    id: this.id
                }
            });
        }
    }
}
</script>