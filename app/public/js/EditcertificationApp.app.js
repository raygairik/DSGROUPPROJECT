var EditcertificationApp = new Vue({
  el: '#EditcertificationApp',
  data: {
    recordCertification: {}
  },
  methods: {
    handleEdit() {
      fetch('api/records/certificationEdit.php',{
      method: 'POST',
      body: JSON.stringify(this.recordCertification),
      headers: {
        "Content-Type": "application/json; charset=utf-8"
      }
    })
    .then( response => response.json() )
    .then( json => {CertificationsApp.recordCertification = json})
    this.handleReset();

    },

    handleReset() {
    this.recordCertification = {
      //certificationID: '',
      certifyingAgency: '',
      certificationName: '',
      expirationPeriod: ''

    }
  }

}, // end methods
created() {
  this.handleReset();
}
});
