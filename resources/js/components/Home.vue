<template>
    <div class="my-2">
        <div class="input-group my-3 p-3">
            <input type="text" class="form-control p-3" aria-describedby="basic-addon2" v-model="buscador">
            <button type="button" class="btn btn-primary input-group-text" id="basic-addon2" @click="getVideos">Buscar</button>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-sm-12 col-md-6 col-lg-4" v-for="video in info" :key="video.id.videoId">
            <div class="card shadow my-3">
                <img :src="video.snippet.thumbnails.medium.url" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{video.snippet.title}}</h5>
                    <p class="card-text">{{video.snippet.channelTitle}}</p>
                    <button class="btn btn-primary" @click="toggleLike(video.id.videoId,video.snippet.title,video.snippet.channelTitle)">
                        {{ isLiked(video.id.videoId) ? 'Quitar Favorito' : 'Añadir a Favoritos' }}
                    </button>
                    <!-- <button class="btn btn-success" @click="addLike(video.id.videoId)">Añadir a tu lista de favoritos</button>
                    <button class="btn btn-danger" @click="deleteLike(video.id.videoId)">Quitar de tu lista de favoritos</button> -->
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
            usuario : 0,
            buscador: '',
            data:[
                {
                    "items": [
                        {
                            "kind": "youtube#searchResult",
                            "etag": "xOZyN3ozmoeE7pwNnmHB07PHHc4",
                            "id": {
                                "kind": "youtube#video",
                                "videoId": "nlXqp3FVrq8"
                            },
                            "snippet": {
                                "publishedAt": "2019-11-01T04:00:10Z",
                                "channelId": "UCeSCejKJS0W4LTptFuBYU0g",
                                "title": "Dalex - Hola Remix ft. Lenny Tavárez, Chencho Corleone, Juhn &quot;El All Star&quot; (Video Lírico Oficial)",
                                "description": "Escúchalo en Spotify: http://socialhive.us/sp_HolaRMX Escúchalo en Apple: http://socialhive.us/ap_HolaRMX Sencillo producido ...",
                                "thumbnails": {
                                    "default": {
                                        "url": "https://i.ytimg.com/vi/nlXqp3FVrq8/default.jpg",
                                        "width": 120,
                                        "height": 90
                                    },
                                    "medium": {
                                        "url": "https://i.ytimg.com/vi/nlXqp3FVrq8/mqdefault.jpg",
                                        "width": 320,
                                        "height": 180
                                    },
                                    "high": {
                                        "url": "https://i.ytimg.com/vi/nlXqp3FVrq8/hqdefault.jpg",
                                        "width": 480,
                                        "height": 360
                                    }
                                },
                                "channelTitle": "Dalex",
                                "liveBroadcastContent": "none",
                                "publishTime": "2019-11-01T04:00:10Z"
                            }
                        },
                        {
                            "kind": "youtube#searchResult",
                            "etag": "Q0GwfdhLpbJEnCHs2xFgwnBtnQo",
                            "id": {
                                "kind": "youtube#video",
                                "videoId": "3vsLAXD_sd0"
                            },
                            "snippet": {
                                "publishedAt": "2015-12-16T21:52:03Z",
                                "channelId": "UCoaZxek7vVcEz4vr65JFgHA",
                                "title": "Hola - Miranda! (Video Oficial)",
                                "description": "Conseguí los vinilos de Miranda! en: https://bit.ly/tiendainterdisc Suscribite a nuestro canal! https://bit.ly/38gOa1q Seguí la Playlist ...",
                                "thumbnails": {
                                    "default": {
                                        "url": "https://i.ytimg.com/vi/3vsLAXD_sd0/default.jpg",
                                        "width": 120,
                                        "height": 90
                                    },
                                    "medium": {
                                        "url": "https://i.ytimg.com/vi/3vsLAXD_sd0/mqdefault.jpg",
                                        "width": 320,
                                        "height": 180
                                    },
                                    "high": {
                                        "url": "https://i.ytimg.com/vi/3vsLAXD_sd0/hqdefault.jpg",
                                        "width": 480,
                                        "height": 360
                                    }
                                },
                                "channelTitle": "Pelo Music Group",
                                "liveBroadcastContent": "none",
                                "publishTime": "2015-12-16T21:52:03Z"
                            }
                        },
                        {
                            "kind": "youtube#searchResult",
                            "etag": "G0eTjX51-rWTEF4jK-DAP-OsW4A",
                            "id": {
                                "kind": "youtube#video",
                                "videoId": "7wTkHmpDE9k"
                            },
                            "snippet": {
                                "publishedAt": "2020-06-17T20:15:08Z",
                                "channelId": "UCquO852ySNwIrQt83GKuEvQ",
                                "title": "Hola hola ¿Cómo estás? La canción infantil para saludar (Preescolar) Saludar las manos",
                                "description": "Canción infantil para los niños más pequeñitos, con esta canción pueden aprender a chasquear y silbar, también a divertirse ...",
                                "thumbnails": {
                                    "default": {
                                        "url": "https://i.ytimg.com/vi/7wTkHmpDE9k/default.jpg",
                                        "width": 120,
                                        "height": 90
                                    },
                                    "medium": {
                                        "url": "https://i.ytimg.com/vi/7wTkHmpDE9k/mqdefault.jpg",
                                        "width": 320,
                                        "height": 180
                                    },
                                    "high": {
                                        "url": "https://i.ytimg.com/vi/7wTkHmpDE9k/hqdefault.jpg",
                                        "width": 480,
                                        "height": 360
                                    }
                                },
                                "channelTitle": "El Show De Pelina",
                                "liveBroadcastContent": "none",
                                "publishTime": "2020-06-17T20:15:08Z"
                            }
                        },
                        {
                            "kind": "youtube#searchResult",
                            "etag": "Q1OCg3SGp-FLU4jn8Zhdi0f1yvQ",
                            "id": {
                                "kind": "youtube#video",
                                "videoId": "4deUxsQOGps"
                            },
                            "snippet": {
                                "publishedAt": "2017-03-15T15:30:04Z",
                                "channelId": "UCyY3Wd5x85o8AKXjYSoxFAQ",
                                "title": "¡Hola! | Canciones Infantiles | Super Simple Español",
                                "description": "Colección Canciones Infantiles 48 Min! ➪ https://youtu.be/N8HUjF8Smjc Digámosle ¡Hola! a nuestros padres, tíos, abuelos y ...",
                                "thumbnails": {
                                    "default": {
                                        "url": "https://i.ytimg.com/vi/4deUxsQOGps/default.jpg",
                                        "width": 120,
                                        "height": 90
                                    },
                                    "medium": {
                                        "url": "https://i.ytimg.com/vi/4deUxsQOGps/mqdefault.jpg",
                                        "width": 320,
                                        "height": 180
                                    },
                                    "high": {
                                        "url": "https://i.ytimg.com/vi/4deUxsQOGps/hqdefault.jpg",
                                        "width": 480,
                                        "height": 360
                                    }
                                },
                                "channelTitle": "Super Simple Español - Canciones Infantiles Y Más",
                                "liveBroadcastContent": "none",
                                "publishTime": "2017-03-15T15:30:04Z"
                            }
                        },
                        {
                            "kind": "youtube#searchResult",
                            "etag": "WmpATa63DQpC7ubHrDRsvbZojA8",
                            "id": {
                                "kind": "youtube#video",
                                "videoId": "2wRjyVenBW4"
                            },
                            "snippet": {
                                "publishedAt": "2019-11-20T19:44:40Z",
                                "channelId": "UCoaZxek7vVcEz4vr65JFgHA",
                                "title": "Miranda! - Hola (Letra)",
                                "description": "Conseguí los vinilos de Miranda! en: https://bit.ly/tiendainterdisc Suscribite a nuestro canal! https://bit.ly/38gOa1q Seguí la Playlist ...",
                                "thumbnails": {
                                    "default": {
                                        "url": "https://i.ytimg.com/vi/2wRjyVenBW4/default.jpg",
                                        "width": 120,
                                        "height": 90
                                    },
                                    "medium": {
                                        "url": "https://i.ytimg.com/vi/2wRjyVenBW4/mqdefault.jpg",
                                        "width": 320,
                                        "height": 180
                                    },
                                    "high": {
                                        "url": "https://i.ytimg.com/vi/2wRjyVenBW4/hqdefault.jpg",
                                        "width": 480,
                                        "height": 360
                                    }
                                },
                                "channelTitle": "Pelo Music Group",
                                "liveBroadcastContent": "none",
                                "publishTime": "2019-11-20T19:44:40Z"
                            }
                        }
                    ]
                }
            ],
        }
    },
    // props: {
    //     user: Number,
    // },
    created () {
        // this.getVideos();
    },
    methods:{
        getVideos(){
            // console.log(this.buscador);
            // this.info = this.data[0].items;
            axios.get('https://www.googleapis.com/youtube/v3/search?key=AIzaSyCDMYamPXJ60AFOqA-V81TWAXUAzGLofIk&q='+this.buscador+'&type=video&part=snippet').then(
                response => (
                    this.info = response.data.items
                )
            );
        },
        // addLike(videoId) {
        //     if (!videoId) {
        //         console.error('El videoId es inválido');
        //         return;
        //     }

        //     const exists = this.likes.some(like => like.videoId === videoId);
        //     if (!exists) {
        //         this.likes.push({ videoId });
        //     } else {
        //         console.log(`El videoId ${videoId} ya existe en la lista de likes.`);
        //     }
        // },
        // deleteLike(videoId) {
        //     if (!videoId) {
        //         console.error('El videoId es inválido');
        //         return;
        //     }
        //     const index = this.likes.findIndex(like => like.videoId === videoId);
        //     if (index !== -1) {
        //         this.likes.splice(index, 1);
        //         console.log(`El videoId ${videoId} ha sido eliminado de la lista de likes.`);
        //     } else {
        //         console.log(`El videoId ${videoId} no se encuentra en la lista de likes.`);
        //     }
        // },
        toggleLike(videoId,titulo,canal) {
            const index = this.likes.indexOf(videoId);
            if (index === -1) {
                this.likes.push(videoId);
                axios.post('/add-favorito?&video=' + videoId+'&titulo='+titulo+'&canal='+canal)
                    .then(response => {
                        console.log(response);
                    }).catch((error) => {
                        console.error('Error al obtener datos de la API:', error);
                    });
            } else {
                this.likes.splice(index, 1);
                axios.delete('/delete-favorito?&video=' + videoId)
                    .then(response => {
                    }).catch((error) => {
                        console.error('Error al obtener datos de la API:', error);
                    });
            }
        },
        isLiked(videoId) {
            return this.likes.includes(videoId);
        },
        updateSearch() {
            this.$emit('search-updated', this.searchQuery);
        }
}
}
</script>