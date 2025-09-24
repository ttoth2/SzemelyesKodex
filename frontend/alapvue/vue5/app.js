new Vue({
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
    computed:{
        megszam(num,input,e){
            this[num] = input - e.target.value.length;
        },
        hunir() {
            if (this.inpt1.length> 0 && this.inpt2.length > 0) {
                this.hun = this.inpt1.text + ' ' + this.inpt2.text;
            }
           
        },
        angir() {
            if (this.inpt1.length> 0 && this.inpt2.length > 0) {
                this.ang = this.inpt2.text + ' ' + this.inpt1.text;
            }
        }
    }
})
Vue.component('hbutton', {
    data: function(){
        return {
            counter: 0
        }
    },
    template:`  
    <button @click="hunir">magyar nev </button>
    <p>Count: {{hun}}</p>`
})
Vue.component('abutton', {
    data: function(){
        return {
            counter: 0
        }
    },
    template:`  
    <<button @click="angir">angol nev </button>
    <p>Count: {{ang}}</p>`
})

