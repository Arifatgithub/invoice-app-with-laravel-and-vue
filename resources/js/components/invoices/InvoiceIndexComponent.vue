<template>
    <h1>
        <div class="invoices container">

        <div class="card__header">
            <div>
                <h2 class="invoice__title">Invoices</h2>
            </div>
            <div>
                <a class="btn btn-secondary">
                    New Invoice
                </a>
            </div>
        </div>

        <div class="table card__content">
            <div class="table--filter">
                <span class="table--filter--collapseBtn ">
                    <i class="fas fa-ellipsis-h"></i>
                </span>
                <div class="table--filter--listWrapper">
                    <ul class="table--filter--list">
                        <li>
                            <p class="table--filter--link table--filter--link--active">
                                All
                            </p>
                        </li>
                        <li>
                            <p class="table--filter--link ">
                                Paid
                            </p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table--search col-md-12">
                <div class="table--search--wrapper">
                    <select class="table--search--select" name="" id="">
                        <option value="">Filter</option>
                    </select>
                </div>
                <div class="relative" style="padding-right: 40%;">
                    <i class="table--search--input--icon fas fa-search "></i>
                    <input class="table--search--input" type="text" placeholder="Search invoice"
                    v-model="searches" @keyup="searchResult">
                </div>
            </div>

            <div class="table--heading">
                <p>ID</p>
                <p>Date</p>
                <p>Number</p>
                <p>Customer</p>
                <p>Due Date</p>
                <p>Total</p>
            </div>

            <!-- item 1 -->
            <div class="table--items" v-for="invoice in invoices">
                <a href="#" class="table--items--transactionId">{{ invoice.id }}</a>
                <p>{{ invoice.date }}</p>
                <p>{{ invoice.number }}</p>
                <p v-if="invoice.customer">{{ invoice.customer.first_name }}</p>
                <p v-else="">...</p>
                <p>{{ invoice.due_date }}</p>
                <p>$ {{ invoice.total }}</p>
            </div>
            <!-- <div class="table--items" v-else>
                <p>No invoice found</p>
            </div> -->
        </div>

    </div>

    <br><br><br>
    </h1>
</template>
<script>
export default{
   mounted(){
    this.fetchInvoices()
   },
   data(){
     return{
        invoices: [],
        searches: ''
     }
   },
   methods: {
    async fetchInvoices(){
        let { data } = await axios.get('/api/invoices');
        this.invoices = data
        // console.log(data)
        console.log(this.invoices)
    },
    async searchResult (){
        let search = await axios.get('api/search?s='+this.searches);
        this.invoices = search.data
        // console.log(search)
        // console.log(search)
    },
    async createInvoice(){
        let {create} = await axios.get('api/create-invoice');
        this.invoices = create
        console.log(this.invoices)
    }
   }
}
</script>
