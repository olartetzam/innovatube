<template>
    <div class="my-2">
        <div class="input-group mb-3">
            <input type="text" class="form-control" aria-describedby="basic-addon2">
            <button type="button" class="btn btn-primary input-group-text" id="basic-addon2">Buscar</button>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-4 col-md-4 col-lg-4" v-for="video in info" :key="video.id.videoId">
            <img :src="video.snippet.thumbnails.medium.url" alt="">
            <p><b>{{video.snippet.title}}</b></p>
            <p>{{video.snippet.channelTitle}}</p>
            <button class="btn btn-success" @click="addLike(video.id.videoId)">Añadir a tu lista de favoritos</button>
            <button class="btn btn-danger" @click="deleteLike(video.id.videoId)">Quitar de tu lista de favoritos</button>
        </div>
    </div>
</template>
 
<script>
import axios from 'axios';
export default {
    data () {
        return {
            info: null,
            likes: [],
        }
    },
    mounted () {
        this.getVideos();
    },
    methods:{
        getVideos(){
            axios.get('https://www.googleapis.com/youtube/v3/search?key=AIzaSyCDMYamPXJ60AFOqA-V81TWAXUAzGLofIk&q=hola&type=video&part=snippet').then(
                response => (
                    this.info = response.data.items
                )
            );
        },
        addLike(videoId) {
            this.likes.push({ videoId });
            console.log(this.likes);
        },
        deleteLike(videoId) {
            console.log(videoId);
            var indice = this.likes.indexOf( videoId );
            console.log(indice);
            if (indice != -1)
                this.likes.splice(indice, 1);
            console.log(this.likes);
        },
    }
}
</script>