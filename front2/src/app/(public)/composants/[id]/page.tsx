/* eslint-disable react/jsx-no-undef */
'use client'
import BreadCrumb from '@/components/BreadCrumb';
import DialogCard from '@/components/cart/DialogCard';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { CartItem, DataContext } from '@/context/datacontext';
import { ArticleComponents, ArticleType } from '@/types';
import { MinusIcon, PlusIcon, Radio, StarIcon } from 'lucide-react'
import Image from 'next/image';
import { useContext, useEffect, useState } from 'react'


export default function Page({ params }: { params: { id: string } }) {
    const [article, setArticle] = useState<ArticleType>();
    const [quantity, setQuantity] = useState<number>(1);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState<string>("");
    const {addCartItem,cart}= useContext(DataContext)

    
  useEffect(() => {

    fetch(`http://localhost:8000/composants/${params.id}`)
      .then(response => {
        if (!response.ok) {
          throw new Error('Network not ok');
        }
        return response.json();
      })
      .then(data => {
        
        setArticle(data);
        setLoading(false);
      })
      .catch(error => {
        setError('Error :'+ error.message );
        setLoading(false);
      });
  }, [params.id]);




console.log(article)

    
      
      function classNames(...classes: string[]) {
        return classes.filter(Boolean).join(' ')
      }
      



 
      if (loading) return <div className="text-center mt-8">Loading...</div>;
      if (error) return <div className="text-center mt-8 text-red-500">{error}</div>;

      let path = [{
        id:article?.categorie.id,
        href:location.origin+"/categorie/"+article?.categorie.name,
        name:article?.categorie.name
      }]

      const handleInputChange = (e:any) => {
        const value = parseInt(e.target.value)
        if (!isNaN(value) && value >= 1) {
          setQuantity(value)
        }
      }



  return (
    <div className="bg-white mt-5" >
      <div className="pt-6">
        <BreadCrumb name={article?.name||""} href={location.href} path={path}  />


        <div className='grid grid-cols-2 grid-rows-1 gap-2 mt-12'>
            <div className='flex justify-center'>
                    <div className="  relative w-full max-w-[400px]  max-h-[400px] h-full rounded-lg block">
                        {article?.pp && (
                        <Image
                            src={article.pp}
                            alt="Gallery image 1"
                            layout="fill"
                            objectFit="contain"
                            className="h-full w-full object-cover object-center"
                        />
                        )}
                    </div>    
            </div>
           <div className='flex flex-col w-full justify-start'>

                <div className="lg:col-span-2 lg:border-r  lg:pr-8">
                    <h1 className="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{article?.name}</h1>
                </div>
                
                <div className="mt-4 lg:row-span-3 lg:mt-0">
                <h2 className="sr-only">Product information</h2>
                {article?.reduction ? 
                <div> 
                  <span className='font-bold text-red-600 text-xl'>{article.reduction} % Reduction</span>
                  <p className="text-3xl text tracking-tight text-gray-900 ">{article?.price * ((100- article.reduction)/100)} $</p>
                  <p className="text-xl text tracking-tight text-gray-900 line-through">{article?.price} $</p>

                </div> : <></>}
              
                {article?.review && <div className="mt-6">
                    <h3 className="sr-only">Reviews</h3>
                    <div className="flex items-center">
                        <div className="flex items-center">
                        {[0, 1, 2, 3, 4].map((rating) => (
                            <StarIcon
                            key={rating}
                            aria-hidden="true"
                            className={classNames(
                                article?.review > rating ? 'text-gray-900' : 'text-gray-200',
                                'h-5 w-5 flex-shrink-0',
                            )}
                            />
                        ))}
                        </div>
                        {/* <p className="sr-only">{reviews.average} out of 5 stars</p>
                        <a href={reviews.href} className="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">
                        {reviews.totalCount} reviews
                        </a> */}
                    </div>
                    </div>}
                          
                    <div className="py-10 lg:col-span-2 lg:col-start-1   lg:pb-16 lg:pr-8 lg:pt-6">
                <div>
                <h3 className="sr-only">Description</h3>

                <div className="space-y-6">
                    <p className="text-base text-gray-900">{article?.description}</p>
                </div>

                <div className="flex items-center gap-4 mt-4">
                  <Button variant="outline" size="icon" className="p-2" onClick={()=>{
                    if(quantity>1){
                      setQuantity(quantity=>quantity-1)
                    }
                    }}>
                    <MinusIcon className="w-4 h-4" />
                  </Button>
                  <Input type="number" value={quantity} onChange={handleInputChange} className="w-16 text-center" />
                  <Button variant="outline" size="icon" className="p-2" onClick={()=>{
                    if( article && quantity<article?.amount  ){
                      setQuantity(quantity=>quantity+1)
                    }
                    }}>
                    <PlusIcon className="w-4 h-4" />
                  </Button>
                </div>

                
                <button
                onClick={()=>{
                  if(article){
                    console.log("up in the button")
                    addCartItem(article,quantity)

                  }
                }}
                type="submit"
                className="mt-10 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
              >
                Ajouter panier
              </button>
                </div>

                <>
                {cart &&
                cart.map((element:CartItem)=>{
                  <p className="text-black font-bold">{element.name}</p>
                })
              }
              </>

            {
                article?.hightlight &&
                <div className="mt-10">
                <h3 className="text-sm font-medium text-gray-900">Highlights</h3>

                <div className="mt-4">
                    <ul role="list" className="list-disc space-y-2 pl-4 text-sm">
                    {article.hightlight.map((content ,index) => (
                        <li key={index} className="text-gray-400">
                        <span className="text-gray-600">{content}</span>
                        </li>
                    ))}
                    </ul>
                </div>
                </div>
            }  

            {
                article?.details &&
                <div className="mt-10">
                <h2 className="text-sm font-medium text-gray-900">Details</h2>

                <div className="mt-4 space-y-6">
                <p className="text-sm text-gray-600">{article?.details}</p>
                <p className="text-sm text-gray-600">{article?.caractéristique}</p>
                </div>
            </div>

            }

            
            </div>

                
            </div>

         

            

            </div>

            
            </div>
        </div>

       
      </div>
  )
}

    