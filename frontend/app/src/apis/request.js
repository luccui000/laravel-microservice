import axios from 'axios';
// import router from '@/router';
import { getToken, setToken } from '@/utils/auth';
import { CONST_APP, CONST_AXIOS } from '@/config/constants';

// Create axios instance
const request = axios.create({
  baseURL: CONST_APP.admin_api,
  timeout: CONST_AXIOS.timeout,
});

request.interceptors.request.use(
  (config) => {
    const token = getToken() || null;
    if (token) {
      config.headers['Authorization'] = 'Bearer ' + token; // Set JWT token
    }

    return config;
  },
  (error) => Promise.reject(error)
);

request.interceptors.response.use(
  (response) => {
    if (response.headers.authorization) {
      setToken(response.headers.authorization);
      response.data.token = response.headers.authorization;
    }
    return response;
  },
  (error) => {
    // const response = error.response;
    // if (response.status == 401) {
    //   router.push('/login');
    // }
    // if (error.response.status) window.location.href = '/login';
    return Promise.reject(error);
  }
);

export default request;
