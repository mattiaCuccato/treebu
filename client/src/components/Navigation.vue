<template>
    <div class="flex flex-row py-5 pl-5 bg-green-200">
        <div class="flex flex-col ml-5 mr-10">
            <span class="text-green-800 text-3xl m-auto font-bold">TREE<span class="text-green-500 text-3xl m-auto font-bold">BU</span></span>
        </div>
        <div v-for='link in Links' :key='link.code' 
            @click='goTo(link)' class='flex-col mr-8 cursor-pointer px-3 py-2 bg-white text-green-800 text-xl rounded-md font-bold hover:bg-green-800 hover:text-white'>
            {{ link.label }}
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            Links:[
                {
                    code:"list_lands",
                    label:"List"
                },
                {
                    code:"insert_land",
                    label:"Create"
                }
            ]
        }
    },
    methods:{
        goTo(link){
            this.$router.push({
                name:link.code
            })
        }
    }
}
</script>