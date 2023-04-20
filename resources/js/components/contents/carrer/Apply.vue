<template>
    <div class="container apply">
      <div class="title">
        <h6>{{$t('carrer.apply_your_next_job')}}</h6>
        <h2>{{$t('carrer.apply_title')}}</h2>
      </div>
      <form @submit.prevent="apply_submit" method="post" enctype="multipart/form-data">
        <div class="body row">
          <div class="col-md-3 col-sm-12">
            <div class="body-pannel">
              <b-form-input ref="first_name" v-model="first_name" :placeholder="$t('first_name')"></b-form-input>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="body-pannel">
              <b-form-input ref="last_name" v-model="last_name" :placeholder="$t('last_name')"></b-form-input>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="body-pannel">
              <b-form-input ref="email" v-model="email" :placeholder="$t('email')"></b-form-input>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="body-pannel">
              <b-form-input ref="phone" v-model="phone" :placeholder="$t('phone')"></b-form-input>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="body-pannel">
              <b-form-input ref="city" v-model="city" :placeholder="$t('city')"></b-form-input>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="body-pannel">
              <b-form-select ref="position" v-model="pos" :options="postext" class="form-select"></b-form-select>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="body-pannel">
              <b-form-input ref="apply_linked_url" v-model="linked_url" :placeholder="$t('carrer.apply_linked_url')"></b-form-input>
            </div>
          </div>
          <div class="col-md-3 col-sm-12">
            <div class="body-pannel">
              <b-form-select ref="education" v-model="edu" :options="edutext" class="form-select"></b-form-select>
            </div>
          </div>
          <div class="col-md-12 col-sm-12">
            <div class="body-pannel">
              <b-form-textarea ref="note" v-model="personal_note" :placeholder="$t('carrer.apply_personal_note')" 
              rows="3" 
              max-rows="6"
              ></b-form-textarea>
            </div>
          </div>
          <div class="col-md-12 col-sm-12">
            <div class="body-pannel" style="text-align:right;">
              <b-button type="submit" variant="outline-primary">{{$t('submit')}}</b-button>
            </div>
          </div>
        </div>
      </form>
    </div>
</template>

<script>
import axios from 'axios'
import swal from 'sweetalert2/dist/sweetalert2.js'

export default {
  props:{
    applyas: String
  },
    data(){
      return{
        pos: null,
        postext: [
            {value: null, text: this.$t('carrer.apply_position')},
            {value: this.$t('carrer.apply_lateral'), text: this.$t('carrer.apply_lateral')},
            {value: this.$t('carrer.apply_product'), text: this.$t('carrer.apply_product')},
            {value: this.$t('carrer.apply_estate'), text: this.$t('carrer.apply_estate')},
            {value: this.$t('carrer.apply_coporate'), text: this.$t('carrer.apply_coporate')},
            {value: this.$t('carrer.apply_law'), text: this.$t('carrer.apply_law')},
            {value: this.$t('carrer.apply_ass_attorney'), text: this.$t('carrer.apply_ass_attorney')},
            {value: this.$t('carrer.apply_cor_attorney'), text: this.$t('carrer.apply_cor_attorney')}
        ],
        edu: null,
        edutext: [
            {value: null, text: this.$t('carrer.apply_education')},
            {value: this.$t('carrer.apply_degree'), text: this.$t('carrer.apply_degree')},
        ],
        first_name : "",
        last_name : "",
        phone : "",
        city : "",
        linked_url : "",
        email: "",
        personal_note : ""
    }
  },    
    methods: {
        async apply_submit() {
        if (this.$refs.first_name.value == '') {
            this.$refs.first_name.focus()
            return false
        }
        if (this.$refs.last_name.value == '') {
            this.$refs.last_name.focus()
            return false
        }
        if (this.$refs.email.value == '') {
            this.$refs.email.focus()
            return false
        }
        if (this.$refs.phone.value == '') {
            this.$refs.phone.focus()
            return false
        }
        if (this.$refs.city.value == '') {
            this.$refs.city.focus()
            return false
        }
        if (this.$refs.position.value == '') {
            this.$refs.position.focus()
            return false
        }
        if (this.$refs.apply_linked_url.value == '') {
            this.$refs.apply_linked_url.focus()
            return false
        }
        if (this.$refs.education.value == '') {
            this.$refs.education.focus()
            return false
        }
        if (this.$refs.note.value == '') {
            this.$refs.note.focus()
            return false
        }
        var form = new FormData();
        form.set('firstname', this.first_name);
        form.set('lastname', this.last_name);
        form.set('email', this.email);
        form.set('phone', this.phone);
        form.set('city', this.city);
        form.set('position', this.pos);
        form.set('linkedin', this.linked_url);
        form.set('education', this.edu);
        form.set('note', this.personal_note);
        form.set('applyas', this.applyas);
        this.loading = true
        try {
            const { data } = await axios.post('/api/applyjob/send', form)
            // console.log(data)
            if (data?.success) {
            swal.fire({
                icon: 'success',
                title: this.$t('jobapply.title'),
                text: this.$t('jobapply.email_success'),
                reverseButtons: true,
                confirmButtonText: this.$t('ok'),
                cancelButtonText: this.$t('cancel')
            })
            } else {
            swal.fire({
                icon: 'error',
                title: this.$t('jobapply.title'),
                text: this.$t('jobapply.email_error'),
                reverseButtons: true,
                confirmButtonText: this.$t('ok'),
                cancelButtonText: this.$t('cancel')
            })
            }
        } catch (err) {
            console.error(err);
        }
        this.loading = false;
        }
    }
}
</script>

<style scoped>
.apply {
    padding: 50px 0;
}
.apply .title {
    text-align: center;
    padding: 40px 0;
}
.apply .title h6 {
    padding-top: 20px;
}
.apply .title h2 {
    padding-top: 20px;
    padding-bottom: 20px;
} 
.apply .body .body-pannel {
    padding: 10px;
} 
.apply .body .body-pannel .btn-outline-primary {
    border-radius: 5px;
    padding: 5px 25px;
} 
</style>