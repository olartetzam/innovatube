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
            <p>{{video.id}}</p>
            <!-- <button class="btn btn-success" @click="addLike(video.id.videoId)">Añadir a tu lista de favoritos</button>-->
            <button class="btn btn-danger" @click="deleteLike(video.id)">Quitar de tu lista de favoritos</button> 
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
        }
    }
}
</script>