import { CONST_APP } from '@/config/constants';

export function getToken() {
  return localStorage.getItem(CONST_APP.token_key);
}

export function setToken(token) {
  return localStorage.setItem(CONST_APP.token_key, token);
}

export function removeToken() {
  return localStorage.removeItem(CONST_APP.token_key);
}
