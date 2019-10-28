var CertificationsApp = new Vue({
  el: '#CertificationsApp',
  data: {
    certifications: [],
    recordCertification: {}
  },
  methods: {
    fetchCertifications() {
      fetch('api/records/certification.php')
      .then(response => response.json())
      .then(json => { CertificationsApp.certifications = json})
    },

    handleSubmit(event) {
          fetch('api/records/certificationpost.php', {
            method: 'POST',
            body: JSON.stringify(this.recordCertification),
            headers: {
              "Content-Type": "application/json; charset=utf-8"
            }
          })
          .then( response => response.json() )
          .then( json => {CertificationsApp.certifications.push(json[0])})
          .catch( err => {
            console.error('RECORD POST ERROR:');
            console.error(err);
          });
          this.handleReset();
        },

  handleReset() {
    this.recordCertification = {
      certificationID: '',
      certifyingAgency: '',
      certificationName: '',
      expirationPeriod: ''
    }
  },

  handleRowClick(certifications) {
    EditcertificationApp.recordCertification = certifications;
  },

    deleteTransaction(c){
      fetch('api/records/certificationDelete.php', {
        method: 'POST',
        body: JSON.stringify(c),
        headers: {
          "Content-Type": "application/json; charset=utf-8"
        }
      })
      .then( response => response.json() )
      .then( json => {CertificationsApp.certifications = json})
    }
},

created() {
  this.handleReset();
  this.fetchCertifications();
}
});
