var recordsApp = new Vue({
  el: '#recordsApp',
  data: {
    reports:[],
    reportRadio: [],
    enrollments: [],
    recordenrollments: {},
    members: [],
    certifications: [],
    filter: {
      certificationID:'',
      Radio:'',
      Station:''
    }
  },
  methods: {
    fetchCertificates() {
      fetch('api/records/certification.php')
      .then(response => response.json())
      .then(json => { recordsApp.certifications = json })
    },
    fetchExpiredRecords() {
      fetch('api/records/report.php')
      .then(response => response.json())
      .then(json => { recordsApp.reports = json })
    },
    fetchRadioStationRecords() {
      fetch('api/records/reportradio.php')
      .then(response => response.json())
      .then(json => { recordsApp.reportRadio = json })
    },
    fetchMembers() {
      fetch('api/records/member.php')
      .then(response => response.json())
      .then(json => { recordsApp.members = json })
    }

},
created() {
  this.fetchExpiredRecords();
  this.fetchCertificates();
  this.fetchMembers();
  this.fetchRadioStationRecords();
}
});
