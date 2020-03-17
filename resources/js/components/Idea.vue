<template>
    <div class="card">
                <h2>Captura tus ideas</h2>
                <div class="card-body">
                    <h4 class="card-title">¿En qué estás pensando?</h4>
                    <form v-on:submit.prevent="createIdea">
                        <div class="input-group">
                            <input type="text" name="descripcion" class="form-control input-sm" v-model="newIdea" maxlength="256">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary">Agregar</button>
                                </span>
                            </div>
                        </form>
                        <hr>
                        <ul class="list-unstyled">
                            <li v-for="idea in ideas">
                                <p>
                                    <small class="text-muted"> 
                                    <em>{{ since(idea.created_at) }}</em> 
                                </small>
                                    {{ idea.descripcion }}
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import moment from 'moment';  
    import toastr from 'toastr';

    moment.locale('es');

    export default {

        data () {
            return {
                ideas: [],
                newIdea: '',
            }
        },
        created: function() {
        
            this.getIdeas();
        },
        methods: {

            since: function(d) {
                return moment(d).fromNow();
            },

            getIdeas: function() {
                var urlIdeas = 'mis-ideas';
                axios.get(urlIdeas).then(response => {
                    this.ideas = response.data
                });
            },

            createIdea: function() {
                var url = 'guardar-idea';
                axios.post(url, {
                descripcion: this.newIdea
                }).then(response => {
                 
                this.getIdeas();
                this.newIdea = '',
                toastr.success('Nueva idea registrada');

                }).catch(error => {
                   toastr.error('Error');
                });
            }
        
        }
    }
</script>
