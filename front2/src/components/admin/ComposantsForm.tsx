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
import { articleSchema, SchemaRegister } from "@/types"
import { zodResolver } from "@hookform/resolvers/zod"
import { useForm } from "react-hook-form"
import { z } from "zod"
import React, { SetStateAction, useState } from "react"
import toast from "react-hot-toast"
import { LoaderCircle } from "lucide-react"
import { Article } from "../ManageComposant"

type artile = {
    article?: Article; 
    edit:boolean

}
const ComposantsForm = ({article,edit}:artile) => {

    const [isLoading,setIsLoading] = useState(false)
    const form = useForm<z.infer<typeof articleSchema>>({
        resolver: zodResolver(articleSchema ),
        defaultValues: {
         name:article?.name,
         price:article?.price,
         description:article?.description,
         caractéristique:article?.caractéristique,
         reduction:article?.reduction,
         details:article?.details,
         amount:article?.amount
          
        },
      })



      
      function onSubmit(values: z.infer<typeof SchemaRegister>) {
       setIsLoading(true)
        // const data =    handleRegister(values.email,
        //     values.password,
        //     values.username,
        // )
        setIsLoading(false)
      }
  return (
  
    <Card className="p-2 ">
    <CardHeader className="space-y-1">
        <CardTitle className="text-2xl ">{`${edit?'Edit Product':'New Product'}`}</CardTitle>
        {/* <CardDescription >
        Enter your email below to register your account
        </CardDescription> */}
    </CardHeader>
    <Form {...form} >
    <form  onSubmit={form.handleSubmit(onSubmit)} className="p-3 content-start items-start flex-col space-y-8">
        <FormField
        control={form.control}
        name="name"
        render={({ field }) => (
            <FormItem className="flex-col items-start content-start w-full">
            <FormLabel className="text-start w-full" >Name</FormLabel>
            <FormControl>
                <Input placeholder="lucas" {...field} />
            </FormControl>
            
            <FormMessage />
            </FormItem>
        )}
        />  
        <FormField
        control={form.control}
        name="description"
        render={({ field }) => (
            <FormItem className="flex-col items-start content-start w-full">
            <FormLabel className="text-start w-full" >Description</FormLabel>
            <FormControl>
                <Input type="string"  placeholder="Description" {...field} />  
            </FormControl>
            
            <FormMessage />
            </FormItem>
        )}
        /> 
        <FormField
        control={form.control}
        name="caractéristique"
        render={({ field }) => (
            <FormItem className="w-full">
            <FormLabel className="text-start items-start w-full" >Caractéristique</FormLabel>
            <FormControl>
                <Input type='string' placeholder="shadcn@dd11" {...field} />
            </FormControl>
            
            <FormMessage />
            </FormItem>
        )}
        />  
         <FormField
        control={form.control}
        name="price"
        render={({ field }) => (
            <FormItem className="w-full">
            <FormLabel className="text-start items-start w-full" >Price</FormLabel>
            <FormControl>
                <Input type='string' placeholder="shadcn@dd11" {...field} />
            </FormControl>
            
            <FormMessage />
            </FormItem>
        )}
        /> 
         <FormField
        control={form.control}
        name="details"
        render={({ field }) => (
            <FormItem className="w-full">
            <FormLabel className="text-start items-start w-full" >Details</FormLabel>
            <FormControl>
                <Input type='string' placeholder="100" {...field} />
            </FormControl>
            
            <FormMessage />
            </FormItem>
        )}
        />
        <FormField
        control={form.control}
        name="amount"
        render={({ field }) => (
            <FormItem className="w-full">
            <FormLabel className="text-start items-start w-full" >Amount</FormLabel>
            <FormControl>
                <Input type='string' placeholder="100" {...field} />
            </FormControl>
            
            <FormMessage />
            </FormItem>
        )}
        /> 
        <FormField
        control={form.control}
        name="reduction"
        render={({ field }) => (
            <FormItem className="w-full">
            <FormLabel className="text-start items-start w-full" >Reduction</FormLabel>
            <FormControl>
                <Input type='string' placeholder="10" {...field} />
            </FormControl>
            
            <FormMessage />
            </FormItem>
        )}
        /> 
        {/* <FormField
        control={form.control}
        name="highlight"
        render={({ field }) => (
            <FormItem className="w-full">
            <FormLabel className="text-start items-start w-full" >Highlight</FormLabel>
            <FormControl>
                <Input type="string" placeholder="10" {...field} />
            </FormControl>
            
            <FormMessage />
            </FormItem>
        )}
        /> */}
        <Button className="w-full"> {isLoading && (
            <LoaderCircle />        )}Register</Button>
    </form>
    </Form>
   
    </Card>
  )
}

export default ComposantsForm
