let myMixin = {
    created() {
        this.hello();
    },
    methods: {
        hello() {
            console.log('Hello from mixin!');
        }
    }
}

Vue.component('button-counter', {
    mixins: [myMixin],
    data() {
        return {
            counter: 0
        }
    },
    template: `
    <div>
        <button @click="counter++">Add 1</button>
        Counter: {{ counter }}
    </div>
    `


    /*data: function () {
        return {
            counter: 0
        }
    },*/
    /*
    props: ['counter'],
    template: `
    '<div>
        <button @click ="$emit('add-some', 1)">Add 1</button>
        <button @click ="$emit('add-some', 5)">Add 5</button>

        Counter: {{ counter }}
    </div>'
    `*/
})


/*
Vue.component('component-a', {
    template: `<div>Component A</div>`
})

Vue.component('component-b', {
    template: `<div><component-a></component-a>Component B </div>`
})

Vue.component('component-b', {
    template: `<div>Component C</div>`
})
*/

/*
let ComponentA = {
    template: `<div>Component A</div>`
}

let ComponentB = {
    template: `<div>Component B</div>`
}

let ComponentC = {
    template: `<div>Component C</div>`
}
*/
Vue.component('custom-input', {
    props: ['value'],
    template: `
    <input :value="value" @input="$emit('input', $event.target.value)">
    `
})

Vue.component('hello-user', {
    props: ['name'],
    template: '<div>Hello, <slot></slot>!</div>'
})

let app = new Vue({
    el: '#app',
    data: {
        name: 'SomaFoxRunningClub',
        inputText: 'Hello world'
    },
    /*
    components: {
        'component-a': ComponentA,
        'component-b': ComponentB
    },*/
    /*data: {

        name: 'SomaFoxRunningClub',
        counter: 0

    },*/
    /*methods: {
        addOne() {
            this.counter++;
        },
        addSome(valueToAdd) {
            this.counter += valueToAdd;
        }
    }*/
})
/*
Vue.component('hello-user', {
    // props: ['name'],
    props: {
        name: {
            type: String,
            required: false,
            default: 'SomaFoxRunningClub'
        }
    },
    template: '<div>Hello, {{name}}!</div>'
})*/