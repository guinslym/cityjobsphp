<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default v-for='notebook in notebooks">
                    <div class="panel-heading">{{ notebook.name }}</div>

                    <div class="panel-body">
                        {{ notebook.body }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                notebooks: []
            }
        },
        mounted() {
            var self=this;
            axios.get('/notebook').then(function(response){
                self.notebooks=response.data
                //console.log(response);
            });
        }
    }
</script>
