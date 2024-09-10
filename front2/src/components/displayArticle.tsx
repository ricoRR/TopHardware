"use client"
import React, { useState, useEffect } from 'react';
import Link from 'next/link';
import Article from '@/components/article';
import { ArticleType } from '@/types';

const DisplayArticle = (props:{Articles:ArticleType[]}) => {

    if(props.Articles.length > 0){

        
  return (
    <div className="bg-white">
    <div className="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">

      
      <div className="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        {props.Articles && props.Articles.map((product) => (
          <Link key={product.id} href={`/composants/${product.id}`} >
            <Article stripeid={product.stripeid} price={product.price} name={product.name} pp={product.pp} views={product.views} 
            onAddToCart={function (): void {
                    throw new Error('Function not implemented.');
                } } />
          </Link>
        ))}
      </div>
    </div>
  </div>
  );

    }


 


  return (
    <div className='flex flex-row w-full  justify-center'>
          <p className=' font-bold text-xl mt-10 '>No result found</p>

    </div>
)

}


export default DisplayArticle;