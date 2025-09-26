
let app= new Vue({
    el:'#app',
    data:{
        num1: 10,
        num2: 20,
        num11: 10,
        num22: 20,
        inpt1: '',
        inpt2: '',
        udv:'',
        hun: '',
        ang: '',
        mutat: false,
        mutat1: false,
        mutat2: false
    },
    methods:{
        megszam(num,input,e){
            this[num] = input - e.target.value.length;
            if (this.inpt1.length> 0 && this.inpt2.length > 0) {
                this.udv = this.inpt1+ ' ' + this.inpt2;
                this.mutat = true;
            }else {
                this.mutat = false;
            }
        },
        ir(mutat) {
            this.mutat1 = false;
            this.mutat2 = false;
            if (this.inpt1.length> 0 && this.inpt2.length > 0) {
                this.hun = this.inpt1+ ' ' + this.inpt2;
                this.ang = this.inpt2 +' ' + this.inpt1;
                this[mutat] = true;       
            }
            else {
                this.hun = '';
                this.ang = '';
            }
        },
    }, 
})


