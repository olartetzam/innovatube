<template>
    <div class="my-2">
        <form >
            <div class="input-group my-3 p-3">
                <input 
                    type="text" 
                    class="form-control p-3" 
                    aria-describedby="Search"
                    v-model = "buscador"
                    @keyup="buscarFavorito"
                >
                <button type="submit" class="btn btn-primary input-group-text" id="basic-addon2">Buscar</button>
            </div>
        </form>
    </div>
    <div class="row my-2">
        <div class="col-sm-12 col-md-6 col-lg-4" v-for="video in info" :key="video.id.videoId">
             <div class="card shadow my-3">
                <img :src="video.snippet.thumbnails.medium.url" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{video.snippet.title}}</h5>
                    <p class="card-text">{{video.snippet.channelTitle}}</p>
                    <!-- <button class="btn btn-success" @click="addLike(video.id.videoId)">Añadir a tu lista de favoritos</button>-->
                    <button class="btn btn-danger" @click="deleteLike(video.id)">Quitar de tu lista de favoritos</button> 
                </div>
             </div>
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
            id_videos : [],
            buscador:'',
        }
    },
    props:['user'],
    mounted () {
        this.getVideos();
    },
    methods:{
        getVideos(){
            axios.get('/todo-favorito').then(
                response => {
                    var vidio = response.data.map(video => video.video_id);
                    this.id_videos = vidio.join(',');
                    axios.get('https://www.googleapis.com/youtube/v3/videos?part=snippet,contentDetails,statistics&id='+this.id_videos+'&key=AIzaSyCDMYamPXJ60AFOqA-V81TWAXUAzGLofIk').then(
                        response => (
                            this.info = response.data.items
                        )
                    );
                }
            );
        },
        deleteLike(video){
            console.log(video);
            axios.delete('/delete-favorito?video='+video).then(
                console.log('se elimino de favorito')
            );
        },
        buscarFavorito(){
            axios.get('/buscar-favorito?busqueda='+this.buscador).then(
                response => {
                    var vidio = response.data.map(video => video.video_id);
                    this.id_videos = vidio.join(',');
                    // console.log(this.id_videos);
                    axios.get('https://www.googleapis.com/youtube/v3/videos?part=snippet,contentDetails,statistics&id='+this.id_videos+'&key=AIzaSyCDMYamPXJ60AFOqA-V81TWAXUAzGLofIk').then(
                        response => (
                            this.info = response.data.items
                        )
                    );
                }
            );
        }
    }
}
</script>