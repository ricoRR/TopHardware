"use client"
import { Nav } from '@/components/Nav';
import './globals.css'

import React from 'react'

import  { Toaster } from 'react-hot-toast';
import { DataProvider } from '@/context/datacontext';
import { usePathname, useRouter } from 'next/navigation';




export default function RootLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  


const pathname = usePathname()
 
 


  return (
  <html lang="en">
    <body className='flex flex-row justify-center' >
      <main className='max-w-[1440px] w-[90%] '>
      <DataProvider>

    {
      pathname !=='/auth' &&
   <Nav />  }  
    
    <Toaster />
          
      
        


         {children}

    <Toaster
  position="top-center"
  reverseOrder={false}
/>
</DataProvider>

</main>


    </body>

  </html>
  )
}

