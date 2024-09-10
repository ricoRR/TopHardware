import {  Dialog, DialogPanel, DialogTitle } from '@headlessui/react'
import React, { useState } from 'react'
import { Button } from '../ui/button'
import { Article } from '../ManageComposant';
import ComposantsForm from './ComposantsForm';
type articleType = {
    article?: Article;   key?: number; edit:boolean; children:React.ReactNode;

}
export default function ComposantsDialog({article,children,edit}:articleType) {
  let [isOpen, setIsOpen] = useState(false)


  console.log(article,"in the form")
  function open() {
    setIsOpen(true)
  }

  function close() {
    setIsOpen(false)
  }

  return (
    <>
      <div
        onClick={open}
        className="rounded-md bg-transparent   "
      >
        {children}
      </div>

      <Dialog open={isOpen} as="div" className="relative z-10 focus:outline-none" onClose={close}>
        <div className="fixed inset-0 z-10 w-screen ">
            <div className="flex min-h-full items-center backdrop-blur-sm justify-center p-4">
                <DialogPanel
                transition
                className="w-full max-w-[30%]  rounded-xl  duration-300 ease-out data-[closed]:transform-[scale(95%)] data-[closed]:opacity-0"
                >
                    <ComposantsForm article={article}  edit={edit}/>
                </DialogPanel>
            </div>
        </div>
    </Dialog>
    </>
  )
}
