/* eslint-disable react/jsx-no-undef */
'use client'
import Article from '@/components/article';
import BreadCrumb from '@/components/BreadCrumb';
import { ArticleComponents, ArticleType } from '@/types';
import { Radio, StarIcon } from 'lucide-react'
import Image from 'next/image';
import Link from 'next/link';
import { useEffect, useState } from 'react'



export default function Page({ params }: { params: { name: string } }) {
    const [Composants, setComposants] = useState<ArticleType[]>();
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string>("");

  useEffect(() => {

    fetch(`http://localhost:8000/categorie/${params.name}`)
      .then(response => {
        if (!response.ok) {
          throw new Error('Network not ok');
        }
        return response.json();
      })
      .then(data => {
        setComposants(data);
        setLoading(false);
      })
      .catch(error => {
        setError('Error :'+ error.message );
        setLoading(false);
      });
  }, [params.name]);







 
      if (loading) return <div className="text-center mt-8">Loading...</div>;
      if (error) return <div className="text-center mt-8 text-red-500">{error}</div>;

   



  return (
    <div className="bg-white">
    <div className="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
      <h2 className="sr-only">Products</h2>

      <div className="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        {Composants && Composants.map((product) => (
          <Link key={product.id} href={`/composants/${product.id}`} >
            <Article price={product.price} name={product.name} pp={product.pp} onAddToCart={function (): void {
              throw new Error('Function not implemented.');
            } } views={0} />
          </Link>
        ))}
      </div>
    </div>
  </div>
  )
}
