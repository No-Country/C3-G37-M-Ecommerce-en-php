const app=new Vue({
    el:'#app',
    data:{
        productos:[
            {id:1,nombre:'Red de computadoras',pubdate:'2006-9',price:15.00,count:1},
            {id:2,nombre:'sistema operativo',pubdate:'2016-9',price:20.00,count:1},
            {id:3,nombre:'Programación JavaSE',pubdate:'2012-9',price:35.00,count:1},
            {id:4,nombre:'Programación PHP',pubdate:'2010-9',price:42.00,count:1},
        ]
    },
    methods:{
        increment(index){
            console.log('---------increment'+index)
            this.productos[index].count++;
        },
        decrement(index){
            console.log('---------decrement'+index)
            this.productos[index].count--;
        },
        del(index){
            this.productos.splice(index,1);
        }
    },
    filters:{
        showPrice(price){
            return 'S/.'+price.toFixed(2)
        }
    },
    computed:{
        sum:{
            get(){
                let sum=0;
                for (let pro of this.productos){
                    sum+=pro.count*pro.price;
                }
                return '$/.'+ sum;
            }
        },
        cantp:{
            get(){
                return this.productos.length;
            }
        },
        cantpb:{
            get(){
                let sum=0;
                for (let book of this.productos){
                    sum+=book.count;
                }
                return sum;
            }
        },
        preciototal:{
            get(producto){
                let sum=0;
                sum= producto.count;
                return sum;
            }
        }

    }
})