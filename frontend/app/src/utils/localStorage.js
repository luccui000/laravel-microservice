export const localGet = (key) => {
  return localStorage.getItem(key);
};

export const localSet = (key, value) => {
  localStorage.setItem(key, value);
};
