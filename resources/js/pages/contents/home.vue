<template>
  <div>
    <Imageslider />

    <!--About section -->
    <Aboutsection />

    <!-- Fields of application -->
    <Fieldsection />
    
    <!--Features of Product Group -->
    <Featuresection />

    <!-- Introduction -->
    <Introductionsection />

    <!-- Subscription Type -->
    <Subscriptionsection />

    <!-- Contact Us -->
    <Contactsection />

    <!-- New Infomation -->
    <Informationsection />

    <!-- Footer -->
    <Footer />
  </div>
</template>

<script>
import Imageslider from '~/components/HomeImageSlider'
import Aboutsection from '~/components/contents/home/About'
import Fieldsection from '~/components/contents/home/Field'
import Featuresection from '~/components/contents/home/Features'
import Introductionsection from '~/components/contents/home/Introduction'
import Subscriptionsection from '~/components/contents/home/Subscription'
import Contactsection from '~/components/contents/home/Contact'
import Informationsection from '~/components/contents/home/Information'
import Footer from '~/components/Footer'
export default {
  props:{
    language: String
  },
  created() {
  },
  components: {
      Imageslider,
      Aboutsection,
      Featuresection,
      Fieldsection,
      Introductionsection,
      Subscriptionsection,
      Contactsection,
      Informationsection,
      Footer
  },
  methods: {
  }
}
</script>

<style scoped>
.imageslider {
    width: 100%;
}
</style>
