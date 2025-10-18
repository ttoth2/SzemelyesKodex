new Vue({
    el: '#app',
    data: {
        message1: '',
        message2: '',
        statusz: '',
        num1: 10,
        num2: 20
    },
    computed: {
        vezeteknevHatralevo() {
            return [this.num1 - this.message1.length ,this.num2 - this.message2.length];
        },
        
    },
    methods: {
        Magyarka() {
            this.statusz = "Üdvözöllek " + this.message1 + " " + this.message2 + "!";
        },
        Angolka() {
            this.statusz = "Üdvözöllek " + this.message2 + " " + this.message1 + "!";
        }
    }
})