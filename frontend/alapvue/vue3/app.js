Vue.component('tab-home',{
    template: '<div>Home component</div>'

})
Vue.component('tab-hello',{
    template: '<div>Hello component</div>'
    
})
Vue.component('tab-fruit',{
    template: '<div>Fruit component</div>'
    
})
new Vue({
    el:'#app',
    data:{
        currentTab:'Home',
        tabs:['Hom','Hello','Fruit']
    },
    computed:{
        currentTabComponent:function(){
            return 'tab-'+this.currentTab.toLowerCase();
        }
    },
})
