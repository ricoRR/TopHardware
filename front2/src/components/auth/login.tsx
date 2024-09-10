"use client"
import { Button } from "@/components/ui/button"
import {
  Card,
  CardDescription,
  CardHeader,
  CardTitle,
} from "@/components/ui/card"
import {
  Form,
  FormControl,
  FormField,
  FormItem,
  FormLabel,
  FormMessage,
} from "@/components/ui/form"
import { Input } from "@/components/ui/input"
import { SchemaLogin } from "../../types"
import { getSession, login } from "@/utils/login"
import { zodResolver } from "@hookform/resolvers/zod"
import { useForm } from "react-hook-form"
import { z } from "zod"
import { Icons } from "../icons"
import React, { useContext, useState } from "react"
import { DataContext } from '@/context/datacontext';
import { useRouter } from "next/navigation"
import toast from "react-hot-toast"


export function Login() {
  const [isLoading,setIsLoading] = useState(false)

  const form = useForm<z.infer<typeof SchemaLogin>>({
    resolver: zodResolver(SchemaLogin),
    defaultValues: {
      username: "",
      password:""
      
    },
  })
  const router = useRouter()
  async function  onSubmit(values: z.infer<typeof SchemaLogin>) {
      setIsLoading(true)
      try {
        const data=   await login(values.username, values.password);

        if(data==200){
          router.replace('/')
          toast.success("Auth sucessfull")
        }else if(data==401){
          toast.error("Invalid credentials")
        }


      } catch (error) {
        if(error instanceof Error){
          if(error.message=="Request failed with status code 401"){
            toast.error('Invalid credantials')
            console.error(error.message)
          }else{
            toast.error('Had a problem to auth!')
            console.error(error.message)
          }
        }
        
      }
      setIsLoading(false)
  }

  

  return (
    <>
    <Card className="p-4">
      <CardHeader className="space-y-1">
        <CardTitle className="text-2xl ">Login an account</CardTitle>
        <CardDescription >
          Enter your email below to login your account
        </CardDescription>
      </CardHeader>
    <Form {...form} >
      <form  onSubmit={form.handleSubmit(onSubmit)} className="p-3 content-start items-start flex-col space-y-8">
        <FormField
          control={form.control}
          name="username"
          render={({ field }) => (
            <FormItem className="flex-col items-start content-start w-full">
              <FormLabel className="text-start w-full" >Username</FormLabel>
              <FormControl>
                <Input placeholder="lucas1@gmail.com" {...field} />
              </FormControl>
              
              <FormMessage />
            </FormItem>
          )}
        /> 
        <FormField
          control={form.control}
          name="password"
          render={({ field }) => (
            <FormItem className="w-full">
              <FormLabel className="text-start items-start w-full" >Password</FormLabel>
              <FormControl>
                <Input type="password" placeholder="shadcn@dd11" {...field} />
              </FormControl>
              
              <FormMessage />
            </FormItem>
          )}
        />
        <Button  type="submit" className="w-full">{isLoading && (
              <Icons.spinner className="mr-2 h-4 w-4 animate-spin" />
            )}Login</Button>
      </form>
    </Form>
    </Card>
    
</>
    
  )
}