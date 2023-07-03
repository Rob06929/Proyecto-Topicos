
<script setup> 
import {ref} from "vue"

import MainNav from '@/Layouts/MainNav.vue';
import { GoogleMap, Marker, Circle } from "vue3-google-map";

    const center = { lat: -17.78629, lng: -63.18117 };
    let selected= ref('100');
    let circleRef=ref(null);
    let circle={
        center: center,
        radius: parseInt(selected.value),
        strokeColor: "#FF0000",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "#FF0000",
        fillOpacity: 0.35,
      };
    let a=ref(0);

    
</script>


<template>
    <MainNav>
        <div class="flex items-start justify-start h-auto w-auto flex-col p-4">
        
            <GoogleMap api-key="AIzaSyDhgSSTzKOzLw-maUH2Q6DxF_7EBAQkdU0" class="my-3 mx-8 border-2 border-neutral-950 shadow-2xl" style="width:1100px;height:750px;" :center="center" :zoom="15">
                <Marker :options="{ position: center }"/>
                <Circle :options="circle" v-model="selected" ref="circleRef" />

            </GoogleMap>
            
            <div class="ml-8 flex items-center">
                <div class="flex">
                    <label for="opciones" class="block text-gray-700">Radio de busqueda</label>
                    <select id="opciones_radio" v-model="selected" name="opciones" class="border border-gray-300 rounded ml-1">
                    <option value="100" selected>100 metros</option>
                    <option value="500">500 metros</option>
                    <option value="1000">1000 metros</option>
                    <option value="1500">1500 metros</option>
                    
                    </select>

                   
                </div>
                
{{ selected }}
            </div>
        
        </div>

 
    </MainNav>
</template>
