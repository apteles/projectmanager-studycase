import axios from 'axios'


export default axios.create({
    baseURL: 'http://projectmanager.test/',
    headers: {
        Authorization: `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9wcm9qZWN0bWFuYWdlci50ZXN0L2F1dGhlbnRpY2F0aW9uIiwiaWF0IjoxNTU5NzQ0NDQxLCJleHAiOjE1NTk3NDgwNDEsIm5iZiI6MTU1OTc0NDQ0MSwianRpIjoiTFIzUkpvcHVnNnBUVDJkayJ9.vJLRfDCldVCa2o-GCx1UX6N74o1sc7846B0i1O7MFGI`
    }
})