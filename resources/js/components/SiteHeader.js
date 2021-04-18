import { Component, Fragment } from 'react'
import { Transition, Popover } from '@headlessui/react'
import { SearchIcon } from '@heroicons/react/solid'
import { MenuIcon, XIcon, DownloadIcon } from '@heroicons/react/outline'
import ReactDOM from 'react-dom'

const navigation = [
    { name: 'Blog', href: "/blog", current: false },
    { name: 'Documentation', href: "/docs", current: false },
    { name: 'Playground', href: "/playground", current: false },
    { name: 'Roadmap', href: "/roadmap", current: false },
]

class SiteHeader extends Component {
    render() {
        return (
            <Popover as="div" class="bg-white shadow">
                {({ open }) => (
                    <>
                        <div className="max-w-6xl mx-auto px-2 sm:px-4 lg:px-8">
                            <div className="flex justify-between h-16">
                                <div className="flex px-2 lg:px-0">
                                    <a href="/" className="flex-shrink-0 flex items-center">
                                        <img
                                            className="block lg:hidden h-5 w-auto"
                                            src="/img/logo.svg"
                                            alt="Ghost"
                                        />
                                        <img
                                            className="hidden lg:block h-5 w-auto"
                                            src="/img/logo-text.svg"
                                            alt="Ghost"
                                        />
                                    </a>
                                    <div className="hidden lg:ml-6 lg:flex lg:space-x-8">
                                        {navigation.map((item) => (
                                            <a
                                                key={item.name}
                                                href={item.href}
                                                className="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"
                                            >
                                                {item.name}
                                            </a>
                                        ))}
                                    </div>
                                </div>
                                <div className="flex-1 flex items-center justify-center px-2 lg:ml-6 lg:justify-end">
                                    <div className="max-w-lg w-full lg:max-w-xs">
                                        <label htmlFor="search" className="sr-only">
                                            Search
                                        </label>
                                        <div className="relative">
                                            <div className="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <SearchIcon className="h-5 w-5 text-gray-400" aria-hidden="true" />
                                            </div>
                                            <input
                                                id="search"
                                                name="search"
                                                className="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                                placeholder="Search"
                                                type="input"
                                            />
                                            <div class="absolute inset-y-0 right-0 pr-3 focus:hidden flex items-center pointer-events-none group-focus:hidden">
                                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="none"><rect x=".5" y=".5" width="19" height="19" rx="3.5" stroke="currentColor"></rect><path d="M6.5 16l7-12" stroke="currentColor"></path></svg>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="hidden lg:ml-4 lg:flex lg:items-center">
                                        <button class="flex-shrink-0 bg-white p-1 text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <span class="sr-only">Download latest version</span>

                                            <DownloadIcon className="block h-6 w-6" aria-hidden="true" />
                                        </button>
                                    </div>
                                </div>

                                <div className="flex items-center lg:hidden">
                                    {/* Mobile menu button */}
                                    <Popover.Button className="bg-transparent p-3 rounded-md inline-flex items-center justify-center text-cyan-200 hover:text-gray-900 hover:bg-gray-500 hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-white">
                                        <span className="sr-only">Open main menu</span>
                                        {open ? (
                                            <XIcon className="block h-6 w-6" aria-hidden="true" />
                                        ) : (
                                            <MenuIcon className="block h-6 w-6" aria-hidden="true" />
                                        )}
                                    </Popover.Button>
                                </div>
                            </div>
                        </div>

                        <Transition.Root show={open} as={Fragment}>
                            <div className="lg:hidden">
                                <Transition.Child
                                    as={Fragment}
                                    enter="duration-150 ease-out"
                                    enterFrom="opacity-0"
                                    enterTo="opacity-100"
                                    leave="duration-150 ease-in"
                                    leaveFrom="opacity-100"
                                    leaveTo="opacity-0"
                                >
                                    <Popover.Overlay static className="z-20 fixed inset-0 bg-black bg-opacity-25" />
                                </Transition.Child>

                                <Transition.Child
                                    as={Fragment}
                                    enter="duration-150 ease-out"
                                    enterFrom="opacity-0 scale-95"
                                    enterTo="opacity-100 scale-100"
                                    leave="duration-150 ease-in"
                                    leaveFrom="opacity-100 scale-100"
                                    leaveTo="opacity-0 scale-95"
                                >
                                    <Popover.Panel
                                        focus
                                        static
                                        className="z-30 absolute top-0 inset-x-0 max-w-3xl mx-auto w-full p-1 transition transform origin-top"
                                    >
                                        <div className="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y divide-gray-200">
                                            <div className="pt-3 pb-2">
                                                <div className="flex items-center justify-between px-4">
                                                    <div>
                                                        <img
                                                            className="block lg:hidden h-5 w-auto"
                                                            src="/img/logo.svg"
                                                            alt="Ghost"
                                                        />
                                                    </div>
                                                    <div className="-mr-2">
                                                        <Popover.Button className="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-500">
                                                            <span className="sr-only">Close menu</span>
                                                            <XIcon className="h-6 w-6" aria-hidden="true" />
                                                        </Popover.Button>
                                                    </div>
                                                </div>
                                                <div className="mt-3 px-2 space-y-1">
                                                    {navigation.map((item) => (
                                                        <a
                                                            key={item.name}
                                                            href={item.href}
                                                            className="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800"
                                                        >
                                                            {item.name}
                                                        </a>
                                                    ))}
                                                </div>
                                            </div>
                                        </div>
                                    </Popover.Panel>
                                </Transition.Child>
                            </div>
                        </Transition.Root>
                    </>
                )}
            </Popover>
        )
    }
}

export default SiteHeader

if (document.getElementById('site-header')) {
    ReactDOM.render(<SiteHeader />, document.getElementById('site-header'))
}