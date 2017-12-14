<template>
    <div>

        <form>
            <input v-model="query"  name="keywords" type="text" placeholder="Palabras clave">
            <input @click="fetchNodesFromDB()" type="button" value="Envíar">
            <br>
            {{ query }}
            <p v-bind="nodeList">{{ nodeList }}</p>
        </form>
    </div>
</template>

<script>

    export default
    {
        data() {

            return {
                query: "",
                nodeList: "",
                osmQuery: "https://z.overpass-api.de/api/interpreter?data=",
                osmNodeData: null,
            }
        },

        methods: {

            fetchNodesFromDB()
            {

                axios.get('bars/find', {
                    params: {
                        keywords: this.query
                    }
                })
                    .then((res)=>{
                        console.log(res);
                        this.nodeList = res.data;
                        this.buildOSMQuery();
                        this.fetchNodeDataFromOsm();
                    });

            },

            buildOSMQuery()
            {

                let queryStart = "[out:json][timeout:25];(";
                let queryContent = "";
                let queryEnd = ");out body;>;out skel qt;"

                for ( let node of this.nodeList)
                {
                    queryContent += "node("+node+");";
                }

                this.osmQuery += queryStart + queryContent + queryEnd;
                console.log("*DEBUGGER*  Query generada para OSM : "+this.osmQuery);
            },

            fetchNodeDataFromOsm()
            {
                    axios.get(this.osmQuery)
                        .then((res) => {
                        console.log('*DEBUGGER* :  Objeto recibido : ');
                        console.log(res);
                    });
            },

        },



    }

    new Vue({

    })

</script>