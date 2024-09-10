import { cookies } from "next/headers";

const cookieStore =cookies()
export const Logout = async () =>{
    try{
        cookieStore.delete('key')
    }catch(error){
        console.error(error)
    }
};