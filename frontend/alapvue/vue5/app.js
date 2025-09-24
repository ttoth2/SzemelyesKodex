
let app= new Vue({
    el:'#app',
    data:{
        num1: 10,
        num2: 20,
        num11: 10,
        num22: 20,
        inpt1: '',
        inpt2: '',
        hun: '',
        ang: '',
    },
    methods:{
        megszam(num,input,e){
            this[num] = input - e.target.value.length;
        },
        hunir() {
            if (this.inpt1.length> 0 && this.inpt2.length > 0) {
                this.hun = this.inpt1+ ' ' + this.inpt2;
            }
        },
        angir() {
            if (this.inpt1.length> 0 && this.inpt2.length > 0) {
                this.ang = this.inpt2 +' ' + this.inpt1;
            }
        }
        
    },
    computed:{
        
    }
})


