/* eslint-disable react-hooks/rules-of-hooks */


import axios from "axios";
import { getCookie } from 'cookies-next';
import { Shippo } from "shippo";


let token = ""; 


  token = getCookie('session') || "";


let BASEurl = 'http://localhost:8000/'

console.log(token)
export const axiosInstance = axios.create({
  baseURL: BASEurl, 
  headers: {
    common: {
      Authorization: `Bearer ${token}`,
    },
  },
});


export const shippo = new Shippo({apiKeyHeader: process.env.NEXT_PUBLIC_SHIPPO_KEY_API});



