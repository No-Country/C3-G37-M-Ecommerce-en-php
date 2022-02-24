const app=new Vue({
    el:'#app',
    data:{
        books:[
            {idp:12,bookname:'Red de computadoras',pubdate:'2006-9',price:15.00,count:1},
            {idp:46,bookname:'sistema operativo',pubdate:'2016-9',price:20.00,count:1},
            {idp:32,bookname:'Programación JavaSE',pubdate:'2012-9',price:35.00,count:1},
            {idp:55,bookname:'Programación PHP',pubdate:'2010-9',price:42.00,count:1},
        ]
    },
    methods:{
        increment(index){
            console.log('---------increment'+index)
            this.books[index].count++;
        },
        decrement(index){
            //if (this.books[index].count==0) return;
            console.log('---------decrement'+index)
            this.books[index].count--;
        },
        del(index){
            this.books.splice(index,1);
        }
    },
    filters:{
        showPrice(price){
            return '￥'+price.toFixed(2)
        }
    },
    computed:{
        sum:{
            get(){
                let sum=0;
                for (let book of this.books){
                    sum+=book.count*book.price;
                }
                return 'S/.'+sum;
            }
        }
    }
})
