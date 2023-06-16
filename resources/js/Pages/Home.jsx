import Header from "@/Components/Header"
import TopicCard from "@/Components/TopicCard"

export default function Home(){
    return (
        <div className="">
          <Header />
          <div className="w-3/5 mt-8 mx-auto">
            <TopicCard />
          </div>
        </div>
      );
}