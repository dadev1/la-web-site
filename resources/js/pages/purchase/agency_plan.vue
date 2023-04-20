<template>
    <div>
        <div class="header">
            <h1>{{ $t('ias.plan') }}</h1>
        </div>
        <div class="container">
            <div class="content">
                <div class="category_level">
                    <h3>
                        {{ category.app_name }} {{ $t('ias.plan') }}
                        <span style="padding-left: 20px; font-size: 24px">{{ $t(category.price) }}</span>
                        <span class="float-right pr-5">{{ $t(category.price) }}</span>
                    </h3>
                </div>
                <div class="pl-4 pt-5" style="position: relative">
                    <form id="plan-form" method="POST">
                        <div id="step-1">
                            <div v-if="locale == 'en'" style="position: absolute; right: 0; top: -10px">include tax
                            </div>
                            
                            <div class="form-group">
                                <label for="customer_name">{{ $t('customer_name') }}</label>
                                <b-form-input type="text" class="form-control" id="customer_name" name="order_number" />
                            </div>
                            
                            <div class="form-group">
                                <label for="customer_surname">{{ $t('customer_surname') }}</label>
                                <b-form-input type="text" class="form-control" id="customer_surname"
                                    name="order_number" />
                            </div>

                            <div class="form-group">
                                <label for="customer_middle_name">{{ $t('customer_middle_name') }}</label>
                                <b-form-input type="text" class="form-control" id="customer_middle_name"
                                    name="order_number" />
                            </div>

                            <div class="form-group">
                                <label for="customer_email">{{ $t('customer_email') }}</label>
                                <b-form-input type="text" class="form-control" id="customer_email"
                                    name="customer_email" />
                            </div>

                            <div class="form-group">
                                <label for="customer_email">{{ $t('customer_phone_number') }}</label>
                                <b-form-input type="text" class="form-control" id="customer_phone"
                                    name="customer_phone" />
                            </div>

                            <div class="form-group">
                                <label for="customer_email">{{ $t('customer_organization') }}</label>
                                <b-form-input type="text" class="form-control" id="customer_organization"
                                    name="customer_organization" />
                            </div>

                            <div class="form-group">
                                <label for="customer_department">{{ $t('customer_department') }}</label>
                                <b-form-input type="text" class="form-control" id="customer_department"
                                    name="order_number" />
                            </div>

                            <div class="form-group">
                                <label for="customer_email">{{ $t('customer_zipcode') }}</label>
                                <b-form-input type="text" class="form-control" id="customer_zipcode"
                                    name="customer_zipcode" />
                            </div>
                            
                            <div class="form-group">
                                <label for="customer_country">{{ $t('customer_country') }}</label>
                                <b-form-input type="text" class="form-control" id="customer_country"
                                    name="order_number" />
                            </div>

                            <div class="form-group">
                                <label for="customer_city">{{ $t('customer_status') }}</label>
                                <input type="text" class="form-control" id="customer_status" name="customer_status" />
                            </div>

                            <div class="form-group">
                                <label for="customer_city">{{ $t('customer_city') }}</label>
                                <input type="text" class="form-control" id="customer_city" name="order_number" />
                            </div>

                            <div class="form-group">
                                <label for="customer_address">{{ $t('customer_address') }}</label>
                                <b-form-input type="text" class="form-control" id="customer_address"
                                    name="order_number" />
                            </div>
                            
                            <div class="form-group">
                                <label for="orderer_email">{{ $t('orderer_email') }}</label>
                                <b-form-input type="text" class="form-control" id="orderer_email" name="orderer_email" />
                            </div>

                            <div class="form-group">
                                <label for="dealer_name">{{ $t('orderer_name') }}</label>
                                <b-form-input type="text" class="form-control" id="orderer_name" name="orderer_name" />
                            </div>

                            <div class="form-group">
                                <label for="orderer_charge_surname">{{ $t('orderer_charge_surname') }}</label>
                                <b-form-input type="text" class="form-control" id="orderer_charge_surname"
                                    name="order_number" />
                            </div>

                            <div class="form-group">
                                <label for="middle_name_in_charge_of_orderer">{{ $t('middle_name_in_charge_of_orderer')
                                }}</label>
                                <b-form-input type="text" class="form-control" id="middle_name_in_charge_of_orderer"
                                    name="order_number" />
                            </div>

                            <div class="form-group">
                                <label for="orderer_phone">{{ $t('orderer_phone')
                                }}</label>
                                <b-form-input type="text" class="form-control" id="orderer_phone"
                                    name="order_number" />
                            </div>

                            <div class="form-group">
                                <label for="order_number">{{ $t('order_number') }}</label>
                                <b-form-input type="text" class="form-control" id="order_number" name="order_number" />
                            </div>
                    

                            <div class="form-group float-right">
                                <b-button variant="outline-primary" style="margin: 5px"
                                    :to="{ name: $t('dealer.url') }">
                                    {{ $t('back') }}</b-button>
                                <b-button id="next" style="margin: 5px" variant="outline-primary">{{ $t('next') }}</b-button>
                            </div>
                        </div>
                        <div id="step-2" class="d-none">
                            <div style="padding-left: 20px">
                                <router-link :to="{ name: 'terms_and_conditions' }">
                                    <h5>{{ $t('terms_and_conditions') }}</h5>
                                </router-link>
                            </div>
                            <div class="payment_method">
                                <h4>{{ $t('contracted_payment_terms_title') }}</h4>
                                <div class="text-center">
                                    {{ $t('contracted_payment_terms_description1') }}
                                    {{ $t('contracted_payment_terms_description2') }}
                                    {{ $t('contracted_payment_terms_description3') }}
                                </div>
                            </div>
                            <div class="form-group float-right">
                                <b-button id="back" style="margin: 5px" variant="outline-primary">{{ $t('back') }}
                                </b-button>
                                <b-button id="subscribe" style="margin: 5px" variant="outline-primary"
                                    @click="goToCheckout">
                                    {{ $t('subscribe') }}</b-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import { mapGetters } from 'vuex'
import swal from 'sweetalert2/dist/sweetalert2.js'

export default {
    data: () => ({
        stripe: {},
        cardElement: {},
        customer: {
            name: '',
            email: '',
            //first_name: '',
            //last_name: '',
            //email: '',
            //address: '',
            //city: '',
            //state: '',
            //zip_code: ''
        },
        category: '',
        paymentProcessing: false,
        form_display: 'komoju',
        komojuToken: '',
        amount: '',
        order_number: ''
    }),

    created() {
        var app_id = this.$route.query.app_id;
        var cat_id = this.$route.query.cat_id;
        this.amount = this.$route.query.amount;
        this.getCategorydata(app_id, cat_id)
        this.customer.name = this.user.name
        this.customer.email = this.user.email
        this.locale = this.$root.$i18n.locale
    },

    mounted() {
       
        const that = this;
        document.getElementById("next").addEventListener("click", function () {

            let order_number = document.getElementById("order_number").value;
            let orderer_name = document.getElementById("orderer_name").value;
            let orderer_surname = document.getElementById("orderer_charge_surname").value;
            let orderer_middlename = document.getElementById("middle_name_in_charge_of_orderer").value;
            let customer_email = document.getElementById("customer_email").value;
            let customer_name = document.getElementById("customer_name").value;
            let customer_surname = document.getElementById("customer_surname").value;
            let customer_middle_name = document.getElementById("customer_middle_name").value;
            let customer_status = document.getElementById("customer_status").value;
            let customer_department = document.getElementById("customer_department").value;
            let customer_city = document.getElementById("customer_city").value;
            let customer_prefecture = document.getElementById("customer_prefecture").value;
            let customer_country = document.getElementById("customer_country").value;
            let user_id = that.user.id;
            let app_id  = that.$route.query.app_id;
            let cat_id  = that.$route.query.cat_id;
            
            if ( that.checkFormValidation() ) {
                axios.post('/api/agency/dealer_customer_save', {
                    order_number: order_number,
                    orderer_name: orderer_name,
                    orderer_surname: orderer_surname,
                    orderer_middlename: orderer_middlename,
                    customer_email: customer_email,
                    customer_name: customer_name,
                    customer_surname: customer_surname,
                    customer_middle_name: customer_middle_name,
                    customer_status: customer_status,
                    customer_department: customer_department,
                    customer_city: customer_city,
                    customer_prefecture: customer_prefecture,
                    customer_country: customer_country,
                    user_id: user_id,
                    app_id: app_id,
                    cat_id: cat_id
                }).then((res) => {
                    document.getElementById("step-1").classList.add("d-none");
                    document.getElementById("step-2").classList.remove("d-none");
                })
            }
        });
        document.getElementById("back").addEventListener("click", function () {
            document.getElementById("step-1").classList.remove("d-none");
            document.getElementById("step-2").classList.add("d-none");
        });
    },

    methods: {
        async goToCheckout() {
            var app_id = this.$route.query.app_id;
            var cat_id = this.$route.query.cat_id;
            console.log('num' + order_number.value)
            this.$router.push({ name: "agency_checkout", query: { app_id: app_id, cat_id: cat_id, order_no: order_number.value } })
        },

        async getCategorydata(app_id, cat_id) {
            const { data } = await axios.get('/api/get/checkout/category/' + app_id + '/' + cat_id)
            this.category = data;

            console.log(this.category)
        },

        checkFormValidation() {
            
            let order_number   = document.getElementById("order_number").value;
            let orderer_name    = document.getElementById("orderer_name").value;
            let orderer_surname = document.getElementById("orderer_charge_surname").value;
            let orderer_middlename = document.getElementById("middle_name_in_charge_of_orderer").value;
            let customer_email = document.getElementById("customer_email").value;
            let customer_name  = document.getElementById("customer_name").value;
            let customer_surname = document.getElementById("customer_surname").value;
            let customer_middle_name = document.getElementById("customer_middle_name").value;
            let customer_status = document.getElementById("customer_status").value;
            let customer_department = document.getElementById("customer_department").value;
            let customer_city = document.getElementById("customer_city").value;
            let customer_prefecture = document.getElementById("customer_prefecture").value;
            let customer_country = document.getElementById("customer_country").value;
            
            if ( order_number == "" || order_number == '0' ) {
                this.showMessage("warning", "Order Number is required!");
                return false;
            } else if (orderer_name == "") {
                this.showMessage("warning", "Orderer Name is required!");
                return false;
            } else if ( orderer_surname == "" ) {
                this.showMessage("warning", "Orderer Surname is required!");
                return false;
            } else if ( orderer_middlename == "" ) {
                this.showMessage("warning", "Orderer Middlename is required!");
                return false;
            } else if ( customer_email == "" || !this.validateEmail(customer_email)) {
                this.showMessage("warning", "Invalid Customer Email!");
                return false;
            } else if ( customer_name == "" ) {
                this.showMessage("warning", "Customer Name is required!");
                return false;
            } else if ( customer_surname == "" ) {
                this.showMessage("warning", "Customer Surname is required!");
                return false;
            } else if ( customer_middle_name == "" ) {
                this.showMessage("warning", "Customer Middle Name is required!");
                return false;
            } else if ( customer_status == "" ) {
                this.showMessage("warning", "Customer Status is required!");
                return false;
            } else if ( customer_department == "" ) {
                this.showMessage("warning", "Customer Department is required!");
                return false;
            } else if ( customer_city == "" ) {
                this.showMessage("warning", "Customer City is required!");
                return false;
            } else if ( customer_prefecture == "" ) {
                this.showMessage("warning", "Customer Prefecture is required!");
                return false;
            } else if ( customer_country == "" ) {
                this.showMessage("warning", "Customer Country is required!");
                return false;
            } else {
                return true; 
            }
        },
        
        validateEmail (email) {
            return email.match(
                /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
        },
        
        showMessage( status, message ) {
            if(status == 'success') {
                swal.fire({
                    icon: status,
                    title: this.$t('successTitle'),
                    text: this.$t(message),
                    reverseButtons: true,
                    confirmButtonText: this.$t('ok'),
                    cancelButtonText: this.$t('cancel')
                })
            } else if ( status == "warning"){
                swal.fire({
                    icon: status,
                    title: this.$t('warningTitle'),
                    text: this.$t(message),
                    reverseButtons: true,
                    confirmButtonText: this.$t('ok'),
                    cancelButtonText: this.$t('cancel')
                })
            }
            
        },

        //paypal button
        setLoaded: function () {
            
            console.log("paypal_button")
            var user_id = this.user.id
            var app_id  = this.$route.query.app_id;
            var cat_id  = this.$route.query.cat_id;
            var amount  = this.amount
            var router  = this.$router

            console.log(app_id)
            console.log(cat_id)
            console.log(amount)

            paypal_sdk.Buttons({
                style: {
                    shape: 'pill',
                    label: 'checkout'
                },

                createOrder: function (data, actions) {
                    return actions.order.create({
                        purchase_units: [{ "amount": { "currency_code": "USD", "value": amount } }]
                    });
                },

                onApprove: function (data, actions) {
                    console.log(data)
                    return actions.order.capture().then(function (orderData) {

                        // Full available details
                        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                        //Save transaction history  
                        if (orderData.status == 'COMPLETED') {
                            axios.post('/api/payment/checkout/transaction/save/', {
                                transaction: orderData.purchase_units[0].payments.captures[0],
                                payer: orderData.payer,
                                payee: orderData.purchase_units[0].payee,
                                user_id: user_id,
                                app_id: app_id,
                                cat_id: cat_id,
                            }).then((res) => {
                                console.log(res)
                                const data = res.data
                                router.push({ name: 'confirmation', query: { transaction_id: res.data } })
                            })
                        }

                        // Or go to another URL:  actions.redirect('thank_you.html');

                    });
                },

                onError: function (err) {
                    console.log(err);
                }

            }).render(this.$refs.paypal)
        },

        async komoju_purchase() {

            console.log("komoju button successful pass")

            var user_id = this.user.id
            var app_id = this.category.id
            var amount = this.amount
            var router = this.$router
            var token = this.komojuToken

            var querystring = require('querystring')
            //var https = require('https')
            var secret_key = 'sk_123456'
            var auth = 'Basic ' + Buffer.from(secret_key + ':').toString('base64')

            var komoju_post_data = querystring.stringify({
                'amount': amount,
                'currency': 'JPY',
                'payment_details': token
            })

            console.log(komoju_post_data)

            var post_options = {
                host: 'komoju.com',
                port: '443',
                path: '/api/v1/payments',
                method: 'POST',
                headers: {
                    'Authorization': auth,
                    'Content-Length': Buffer.byteLength(komoju_post_data)
                }
            }
            console.log("komoju post option success")

            var post_req = axios.request(post_options, function (res) {
                res.setEncoding('utf8')
                res.on('data', function (chunk) {
                    console.log(chunk)
                })
            })
        },

        async furikomi_payment_post() {
            this.paymentProcessing = true
            var { data } = await axios.post('/api/payment/furikomi/checkout/send', {
                email: this.customer.email,
                price: this.category.price
            })
            this.paymentProcessing = false
        }
    },

    computed: mapGetters({
        user: 'auth/user'
    })
}
</script>

<style scoped>
.header {
    width: 100%;
    background-color: #211F40;
    height: 150px;
}

.header h1 {
    padding-top: 3rem;
    text-align: center;
    color: #fff;
    font-weight: 600;
}

.content {
    width: 100%;
    padding-top: 50px;
}

.content .category_level h4,
.content .payment_method h4,
.content .payment_information_form h4 {
    font-weight: 700;
    padding: 15px 0;
}

.form-group {
    display: flex;
}

.form-group label {
    float: left;
    width: 40%;
}

.form-group .form-control {
    width: 30%;
    float: left;
}

.btn-outline-primary {
    border-radius: 10px;
}

</style>
