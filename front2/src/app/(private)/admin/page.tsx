import CategoryManagement from '@/components/CategoryManagement'
import { getSession, getToken } from '@/utils/login'
import { redirect } from 'next/navigation'
import React from 'react'


const page = async () => {
  const token = await getToken()

  if(!token){
    redirect('/auth')
  }
  return (
    <div>
      <CategoryManagement token={token} />
    </div>
  )
}

export default page
