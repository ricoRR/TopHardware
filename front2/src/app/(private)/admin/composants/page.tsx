import ComposantsList from '@/components/ManageComposant'
import { getToken } from '@/utils/login'
import { redirect } from 'next/navigation'
import React from 'react'

const page = async () => {
  const token = await getToken()

  if(!token){
    redirect('/auth')
  }
  return (
    <>
      <ComposantsList token={token} />
    </>
  )
}

export default page
