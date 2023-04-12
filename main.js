const { createApp } = Vue;

createApp({
    data() {
        return {
            hotels: [],
            current: '',
            newHotel: ''
        }
    },
    methods: {
        getData(index) {
            console.log(index);
            axios.get('server.php', {
                params: {
                    index
                }
            })
                .then((response) => {
                    this.current = response.data;
                })


        },
        addHotel(){
            console.log('addd');
            const data = {
                newhotel: this.newHotel
            };

            axios.post('server.php', data, {
                headers: { 'Content-Type': 'multipart/form-data'}
            })
                .then((response) => {
                    this.hotels = response.data;
                })
        }
    },
    created() {
        axios.get('server.php')
            .then((response) => {
                this.hotels = response.data;
            })
    }
}).mount('#app');