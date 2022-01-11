import axios from "axios";

const baseDomain = "http://localhost:8000";

const API_SERVER = `${baseDomain}/api`;

const Api = axios.create({
  baseURL: API_SERVER,
  withCredentials: true,
});

export default Api;
