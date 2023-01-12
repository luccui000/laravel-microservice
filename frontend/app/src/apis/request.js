import axios from 'axios';
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
    return Promise.reject(error);
  }
);

export default request;
