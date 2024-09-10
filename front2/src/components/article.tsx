/* eslint-disable @next/next/no-img-element */
import { ArticleComponents, ArticleType } from '@/types';
import React from 'react';



const Article: React.FC<ArticleComponents> = ({ name, description, pp, price, views, onAddToCart }) => {
  return (
    <div className="max-w-sm  rounded overflow-hidden shadow-lg m-4">
      <img className="w-full h-48 object-contain" src={pp} alt={name} />
      <div className="px-6 py-4">
        <div className="font-bold h-[48px]  mb-2">{name}</div>
        {/* <p className="text-gray-700 text-base">
          {description}
        </p> */}
        <p className="text-gray-900 text-lg font-semibold mt-2">
          {price} €,
        </p>
        {/* <button 
          className="bg-red-500 hover:bg-green-700 w-full text-white font-bold py-2 px-4 rounded mt-4"
          onClick={onAddToCart}
        >
          Ajouter au panier
        </button> */}
      </div>
    </div>
  );
};

export default Article;