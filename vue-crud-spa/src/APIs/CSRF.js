import Api from './Api.js'


export default {
    getCsrf(){
        return Api.get('csrf-cookie')
    }
}