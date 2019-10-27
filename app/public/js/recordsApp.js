var recordsApp = new Vue({
  el: '#recordsApp',
  data: {
    reports:'',
    reportRadio: [],
    enrollments: [],
    recordenrollments: {},
    members: [],
    certifications: [],
    filter: {
      certificationID:'',
      radioNumber:'',
      stationNumber:''
    }
  },
  methods: {
    fetchCertificates() {
      fetch('api/records/certification.php')
      .then(response => response.json())
      .then(json => { recordsApp.certifications = json })
    }, // end methods
    fetchExpiredRecords() {
      fetch('api/records/report.php')
      .then(response => response.json())
      .then(json => { recordsApp.reports = json })
    }, // end methods
    fetchRadioStationRecords() {
      fetch('api/records/reportradio.php')
      .then(response => response.json())
      .then(json => { recordsApp.reportRadio = json })
    }, // end methods
    fetchMembers() {
      fetch('api/records/member.php')
      .then(response => response.json())
      .then(json => { recordsApp.members = json })
    }

},// end methods
created() {
  this.fetchExpiredRecords();
  this.fetchCertificates();
  this.fetchMembers();
  this.fetchRadioStationRecords();
}
});
