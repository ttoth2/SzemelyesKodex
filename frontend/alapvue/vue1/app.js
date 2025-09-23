new Vue({
    el: '#app',
    data:{
        hello: 'Hello Wold $',
       // reverseHello: '',
        tooltip: 'maus',
        color: 'redtext',
        fontweight: 'boldtext',
        styleObject: {
            color: 'green',
            fontSize:'10px'
        },
        myheader:'<h2>mindegy it milyen szövegvan koma</h2>',
        showHelloWorld: false,  //app.__vue__.showHelloWorld = true
        a: -1,
        fruits: ['apple','banannan','anans'],
        person: {
            firstname:'csaba',
            lastname: 'Tóth' ,
            age: 30,    
        },
        counter: 0,
        mouseEventStatus: 'start',
        inputText: 'hello wild'
    },
    created: function(){
        this.reverseHello = this.hello.split('').reverse().join('');
    },
    methods: {
        /*reverseHello: function(){
            return this.hello.split('').reverse().join('');
        },*/
        capitalizeHello: function(){
            return this.hello.toUpperCase();
        },
        add(a,b){
            return a+b;
        },
        addOne(event){
            if(event){
                event.preventDefault();
            }
            this.counter +=1;
        },
        addSome(valueToAdds){
           
            this.counter +=valueToAdds;
        },
        performMouseOver(){
            this.mouseEventStatus='maus over'
        },
        performMouseOut(){
            this.mouseEventStatus='maus Out'
        },
    },
    /*watch:{
        hello: function(myValue){
            this.reverseHello =myValue.split('').reverse().join('')
        }
    }
    */
   computed: {
        reverseHello: function(){
            return this.hello.split('').reverse().join('');
        }
   }
})
