<template>
  <div class="about">
    <h1>Test view</h1>

    <button @click="testPost">Test post request</button>

  </div>
</template>


<script>
export default {
  data() {
    return {
      form: {
        firstname: "test",
        lastname: "vier"
      },
    };
  },
  computed: {},
  methods: {

    testPost(){

      axios.post("/api/signup", this.form).then((response) => {
          console.log(response.status)
        // if (response.status === 200) {
        //   if (response.data.status == "success") {


        //   }
        //   if (response.data.status == "failed") {
        //     console.log("form errros found");
        //     this.errors = response.data.errors;
        //   }
        // } else {
        //   console.log("server error ", response.status);
        // }
      });
    },


  },
};
</script>


