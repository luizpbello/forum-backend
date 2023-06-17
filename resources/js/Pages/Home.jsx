import Header from "@/Components/Header";
import TopicCard from "@/Components/TopicCard";

export default function Home(topic) {

    return (
        <div className="">
            <Header />
            <div className="w-3/5 mt-8 mx-auto">
                {topic.topics.map((topic) => (
                    <TopicCard key={topic.id} topic={topic} />
                ))}
            </div>
        </div>
    );
}
