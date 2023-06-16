import PrimaryButton from "./PrimaryButton";


export default function Header(){
    return (
        <header className="flex items-center justify-between shadow-md h-20 p-10">
        <div>
          <img className="w-20 h-12" src="/image/logo-g1.png" alt="" />
        </div>
        <div className="flex flex-grow justify-center">
          <input
            className="py-2 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none"
            type="search"
            name=""
            id=""
          />
        </div>
        <PrimaryButton className="ml-4">Criar Tópico</PrimaryButton>
      </header>
    )
}