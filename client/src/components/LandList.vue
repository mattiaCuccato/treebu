<template>
    <div>
        <h1 class="flex flex-row justify-center text-3xl font-bold mt-5">
            Banca Della Terra
        </h1>
        <div class="flex ml-10 mt-10 mr-10 text-xl">
            <div class="flex flex-column" v-if="orderD==true">
                View: <span class="font-bold">&nbsp;Dimensione DESC</span>
            </div>
            <div class="flex flex-column" v-if="orderD==false">
                View: <span class="font-bold">&nbsp;Dimensione ASC</span>
            </div>
            <div class="flex flex-column ml-10" v-if="orderD==true">
                <div class="flex mr-2 m-auto">
                    <span> ASC </span>
                </div>
                <div class="flex">
                    <input type="checkbox" @click="checkOrderF()" />
                </div>
            </div>
            <div class="flex flex-column ml-10" v-if="orderD==false">
                <div class="flex mr-2 m-auto">
                    <span> DESC </span>
                </div>
                <div class="flex">
                    <input type="checkbox" @click="checkOrderV()" />
                </div>
            </div>
        </div>
        <div class="flex ml-10 mt-10" v-for="(land, index) in lands" :key="index">
            <div class="flex flex-col">
                <img :src="land.foto" class="w-80 h-44 cursor-pointer hover:px-1 hover:py-1 hover:rounded-md hover:border-doubled hover:border-4 hover:border-green-800" @click='detailOffer(land)'>
            </div>
            <div class="flex flex-col ml-5 text-2xl">
                <div class="flex flex-row">
                    Comune:&nbsp; <span class="font-bold">{{land.comune}}</span>
                </div>
                <div class="flex flex-row">
                    Dimensione:&nbsp; <span class="font-bold">{{land.dimensione}} m²</span>
                </div>
                <div class="flex flex-row">
                    Tipo di Offerta:&nbsp; <span class="font-bold">{{land.tipo_offerta}}</span>
                </div>
                <div class="flex flex-row">
                    Canone dell'Offerta:&nbsp; <span class="font-bold">{{land.canone_offerta}} €</span>
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
            orderD:true,
            orderA:false,
            lands:[]
        }
    },
    async mounted(){
        this.reload();
    },
    methods:{
        async reload(){
            if(this.orderD == true){
                let response = await axios.get("http://localhost:8000/api/list/dimensione-desc",this.lands);
                this.lands = response.data;
            }else if(this.orderD == false){
                let response = await axios.get("http://localhost:8000/api/list/dimensione-asc",this.lands);
                this.lands = response.data;
            }
        },
        detailOffer(land){
            this.$router.push('/detail/'+land.id)
        },
        checkOrderF(){
            this.orderD = false;
            this.reload();
        },
        checkOrderV(){
            this.orderD = true;
            this.reload();
        }
    }
}
</script>