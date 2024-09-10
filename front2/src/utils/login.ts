"use server"
import { axiosInstance } from './instance';
import { decodeJwt } from "jose";
import { cookies } from "next/headers";
import { sessionType } from '@/types';


export const login = async (
  username: string, 
  password: string, 
) => {


  try {

    const response = await fetch('http://localhost:8000/login', {  
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({  password, username }),
    });
  
  
    const data = await response.json()
  
    if(data.message=='Invalid credentials.'){
      return 401
    }
    
    if(data.token){
      let session = data.token as string;
      const expires = new Date(Date.now() + 60 * 60 * 1000);
    cookies().set("session", session, {
      httpOnly: true,
      secure: process.env.NODE_ENV === "production",
      sameSite: "strict",
      expires,
      path: "/",
    });

    return 200;

    }

    return 404

    
  } catch (error) {
    
    return 404
  }
  
    
  


};








export async function logout() {
  cookies().set("session", "", { expires: new Date(0) });
}




export async function getSession() {
  const session = cookies().get("session");
  // console.log(session)
  if (!session) return null;
  const decode = decodeJwt(session.value) as sessionType

  return decode;
}

export async function getToken() {
  const token = cookies().get("session")?.value;
  if (!token) return null;
 

  return token as  string;
}